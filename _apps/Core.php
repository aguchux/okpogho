<?php

//Write your custome class/methods here
namespace Apps;

use \Apps\MysqliDb;
use \Apps\Session;
use \Verot\UploadFiles;

class Core extends Model
{

	public $token = NULL;
	public $accid = NULL;
	public $toast = false;

	public function __construct()
	{
		parent::__construct();
	}

	public function GenPassword($length = 6)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function Passwordify($password)
	{
		$Passwordify = md5($password);
		return $Passwordify;
	}

	public function ToMoney($amount)
	{
		$amount = number_format($amount, 2, ".", ",");
		return "₦ " . $amount;
	}


	public function cleanup($text)
	{
		$text = preg_replace('/[\t\n\r\0\x0B]/', '', $text);
		$text = preg_replace('/([\s])\1+/', ' ', $text);
		$text = trim($text);
		return strtolower($text);
	}

	public function PostType($haystack, $i = "i", $word = "W")
	{
		$needle_need = "i need";
		$needle_have = "i have";
		if (strtoupper($word) == "W") {   // if $word is "W" then word search instead of string in string search.
			if (preg_match("/\b{$needle_need}\b/{$i}", $haystack)) {
				return "buying";
			}
			if (preg_match("/\b{$needle_have}\b/{$i}", $haystack)) {
				return "selling";
			}
		} else {
			if (preg_match("/{$needle_need}/{$i}", $haystack)) {
				return "buying";
			}
			if (preg_match("/{$needle_have}/{$i}", $haystack)) {
				return "selling";
			}
		}
		return "others";
		// Put quotes around true and false above to return them as strings instead of as bools/ints.
	}

	public function Login($username, $password)
	{
		$Login = mysqli_query($this->dbCon, "select * from accounts where email='$username' AND password='$password'");
		$Login = mysqli_fetch_object($Login);
		return $Login;
	}


	public  function UserInfo($username)
	{
		$UserInfo = mysqli_query($this->dbCon, "SELECT * FROM accounts WHERE email='$username' OR accid='$username'");
		$UserInfo = mysqli_fetch_object($UserInfo);
		return $UserInfo;
	}

	public static function slugify($string)
	{
		$table = array(
			'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
			'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
			'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
			'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
			'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
			'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r', '/' => '-', ' ' => '-', ',' => '', '&' => 'and'
		);
		// -- Remove duplicated spaces
		$stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/', '/[^a-z0-9]/i'), ' ', $string);
		// -- Returns the slug

		return strtolower(strtr($string, $table));
	}



	public function LoadSlides()
	{
		return mysqli_query($this->dbCon, "SELECT * FROM sliders ORDER BY id ASC");
	}


	public function LoadGallaries()
	{
		return mysqli_query($this->dbCon, "SELECT * FROM gallaries ORDER BY id ASC");
	}


	public function LoadPages()
	{
		return mysqli_query($this->dbCon, "SELECT * FROM pages ORDER BY sort ASC");
	}

	public function CountMenuPages()
	{
		$rootpage = $this->getSiteInfo('defaultlandingpage');
		$this->sql("select pageid from pages where parent='{$rootpage}'");
		return $this->countAffected();
	}
	public function LoadSubMenus($shn)
	{
		return mysqli_query($this->dbCon, "select * from pages where parent='$shn'");
	}

	public function CountSubMenus($shn)
	{
		$this->sql("select pageid from pages where parent='$shn'");
		return $this->countAffected();
	}

	public function LoadParentMenus()
	{
		$rootpage = $this->getSiteInfo('defaultlandingpage');
		$result = mysqli_query($this->dbCon, "SELECT * FROM  pages WHERE parent='{$rootpage}' ORDER BY sort ASC");
		return $result;
	}


	public  function SiteInfos()
	{
		$SiteInfos = mysqli_query($this->dbCon, "SELECT * FROM settings");
		return $SiteInfos;
	}

	public  function getSiteInfo($name)
	{
		$getSiteInfo = mysqli_query($this->dbCon, "SELECT value FROM settings WHERE name='$name'");
		$getSiteInfo = mysqli_fetch_object($getSiteInfo);
		return $getSiteInfo->value;
	}

	public  function setSiteInfo($name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE settings SET value='$value' WHERE name='$name'");
		return $this->countAffected();
	}


	function LoadSiteInfo($appid)
	{
		$results = mysqli_query($this->dbCon, "select * from siteinfo where appid='$appid' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}





































	public  function setWebPartInfo($webpartid, $name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE webparts SET `$name`='$value' WHERE id='$webpartid'");
		return $this->countAffected();
	}

	public  function WebPartHeader($phpfile = "")
	{
		$PHPfile = file_get_contents($phpfile);
		preg_match('/^Name:[^\r\n]*/m', $PHPfile, $matches);
		$result = explode(":", $matches[0]);
		return $result[1];
	}

	public function CheckWebParts($pageid, $webpart)
	{
		$CheckWebParts = mysqli_query($this->dbCon, "SELECT count(id) AS cnt FROM webparts WHERE page='$pageid' AND webpart='$webpart'");
		$CheckWebParts = mysqli_fetch_object($CheckWebParts);
		return (int)$CheckWebParts->cnt;
	}

	public function WebPartId($pageid, $webpart)
	{
		$WebPartId = mysqli_query($this->dbCon, "SELECT id FROM webparts WHERE page='$pageid' AND webpart='$webpart'");
		$WebPartId = mysqli_fetch_object($WebPartId);
		return (int)$WebPartId->id;
	}

	public function CountWebParts($pageid)
	{
		$CountWebParts = mysqli_query($this->dbCon, "SELECT count(id) AS cnt FROM webparts WHERE page='$pageid'");
		$CountWebParts = mysqli_fetch_object($CountWebParts);
		return (int)$CountWebParts->cnt;
	}

	public function PageWebParts($pageid)
	{
		$PageWebParts = mysqli_query($this->dbCon, "SELECT * FROM webparts WHERE page='$pageid' ORDER BY sort ASC");
		return $PageWebParts;
	}

	public function CountPagedWebParts($webpart)
	{
		mysqli_query($this->dbCon, "SELECT id FROM webparts WHERE webpart='$webpart'");
		return (int) $this->countAffected();
	}


	public function CountPageWebParts($pageid)
	{
		mysqli_query($this->dbCon, "SELECT id FROM webparts WHERE page='$pageid'");
		return (int) $this->countAffected();
	}

	// DATI ADMIN//
	public function setEditable()
	{
		$Template = new Session;
		if ($Template->auth) {
			return ' editable';
		}
		return null;
	}

	public function Editable()
	{
		$Template = new Template;
		if ($Template->auth) {
			return ' editable';
		}
		return null;
	}

	public function AdminListPages()
	{
		$AdminListPages = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE homepage='0' ");
		return $AdminListPages;
	}

	public function AddView($page)
	{
		$AddView = mysqli_query($this->dbCon, "UPDATE pages SET `views` = (`views` + 1) WHERE id='$page'");
		return $this->countAffected();
	}

	public function Articles()
	{
		$Articles = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE type='blog'");
		return $Articles;
	}

	public function ServicePages()
	{
		$ServicePages = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE type='services'");
		return $ServicePages;
	}

	public function Blogs($limit = 0)
	{
		if ($limit) {
			$Blogs = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE type='blog' ORDER BY RAND() LIMIT $limit");
		} else {
			$Blogs = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE type='blog'");
		}
		return $Blogs;
	}

	public  function GetNextSort()
	{
		$GetNextSort = mysqli_query($this->dbCon, "SELECT count(pageid) AS cnt FROM pages");
		$GetNextSort = mysqli_fetch_object($GetNextSort);
		if (isset($GetNextSort->cnt)) {
			return (int) $GetNextSort->cnt + 1;
		}
		return 1;
	}

	public  function HasPages($page)
	{
		$HasPages = mysqli_query($this->dbCon, "SELECT count(pageid) AS cnt FROM pages WHERE parent='$page'");
		$HasPages = mysqli_fetch_object($HasPages);
		return $HasPages->cnt;
	}

	public  function SubPages($parent)
	{
		$SubPages = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE parent='$parent' ORDER BY sort ASC");
		return $SubPages;
	}

	public  function setBG($url)
	{
		$htm = "";
		$htm .= "style=\"background: url({$url}) no-repeat center center / cover;\"";
		return $htm;
	}


	public function ServiceGalleries()
	{
		$Galleries = mysqli_query($this->dbCon, "SELECT * FROM gallaries WHERE service='1'");
		return $Galleries;
	}


	public function ProjectGalleries()
	{
		$Galleries = mysqli_query($this->dbCon, "SELECT * FROM gallaries WHERE project='1'");
		return $Galleries;
	}


	public function Galleries()
	{
		$Galleries = mysqli_query($this->dbCon, "SELECT * FROM gallaries WHERE gallery='1'");
		return $Galleries;
	}


	public  function  GalleryInfo($photoid)
	{
		$GalleryInfo = mysqli_query($this->dbCon, "SELECT * FROM photos WHERE id='$photoid'");
		$GalleryInfo = mysqli_fetch_object($GalleryInfo);
		return $GalleryInfo;
	}


	public function Upload($FileDir, $fileObj, $height = 1000, $width = 1000)
	{
		$handle = new  Upload($fileObj);
		if ($handle->uploaded) {
			$handle->file_new_name_body = sha1($FileDir  . $height .  time());

			$handle->dir_auto_create = true;
			$handle->image_resize	= true;
			$handle->image_y	= $height;
			$handle->image_x	= $width;
			$handle->file_overwrite = true;
			$handle->dir_chmod = 0777;
			$handle->image_ratio = true;

			$handle->process($FileDir);
			if ($handle->processed) {
				return $handle->file_dst_pathname;
				$handle->clean();
			} else {
				return false;
			}
		}
	}


	public function Sliders()
	{
		$Sliders = mysqli_query($this->dbCon, "SELECT * FROM sliders");
		return $Sliders;
	}


	public function Products()
	{
		$Products = mysqli_query($this->dbCon, "SELECT * FROM products");
		return $Products;
	}
	public  function ProductInfo($product)
	{
		$ProductInfo = mysqli_query($this->dbCon, "SELECT * FROM products WHERE id='$product'");
		$ProductInfo = mysqli_fetch_object($ProductInfo);
		return $ProductInfo;
	}

	public  function setProductInfo($product, $name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE products SET `$name`='$value' WHERE id='$product'");
		return $this->countAffected();
	}

	public  function SliderInfo($slide)
	{
		$SliderInfo = mysqli_query($this->dbCon, "SELECT * FROM slides WHERE id='$slide'");
		$SliderInfo = mysqli_fetch_object($SliderInfo);
		return $SliderInfo;
	}

	public  function setSliderInfo($slide, $name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE slides SET `$name`='$value' WHERE id='$slide'");
		return $this->countAffected();
	}


	public function Pages()
	{
		$rootpage = $this->getSiteInfo('defaultlandingpage');
		$Pages = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE pagestyle='page' OR type='store' OR pagestyle='newspage' AND parent='{$rootpage}' ORDER BY sort ASC");
		return $Pages;
	}

	public function CatPages($cat)
	{
		$rootpage = $this->getSiteInfo('defaultlandingpage');
		$CatPages = mysqli_query($this->dbCon, "SELECT * FROM pages WHERE categories  LIKE '%$cat%' AND pageid!='{$rootpage}' ORDER BY sort ASC");
		return $CatPages;
	}

	public function CMS($id, $cms)
	{
		$CMS = mysqli_query($this->dbCon, "SELECT count(id) AS cnt FROM cms WHERE id='$id'");
		$CMS = mysqli_fetch_object($CMS);
		if ($CMS->cnt) {
			mysqli_query($this->dbCon, "UPDATE cms SET cms='$cms' WHERE id='$id'");
			if ($this->countAffected()) {
				return "updated";
			}
			return "failed";
		} else {
			mysqli_query($this->dbCon, "INSERT INTO sa_cms(id,cms) VALUES('$id','$cms')");
			if ($this->getLastId()) {
				return "created";
			}
			return "failed";
		}
	}

	public function CMSkey($cmskey, $pageid, $webpart, $cms)
	{

		$Template = new Template;
		$accid = $Template->storage("accid");

		$CMS = mysqli_query($this->dbCon, "SELECT count(id) AS cnt FROM cms WHERE cmskey='$cmskey'");
		$CMS = mysqli_fetch_object($CMS);
		if ($CMS->cnt) {
			mysqli_query($this->dbCon, "UPDATE cms SET cms='$cms',admin='$accid' WHERE cmskey='$cmskey'");
			if ($this->countAffected()) {
				return "updated";
			}
			return "failed";
		} else {
			mysqli_query($this->dbCon, "INSERT INTO cms(cmskey,pageid,webpart,cms,admin) VALUES('$cmskey','$pageid','$webpart','$cms','$accid')");
			if ($this->getLastId()) {
				return "created";
			}
			return "failed";
		}
	}

	function clean($string)
	{
		$string = str_replace('%20', ' ', $string);
		return $string;
	}

	public  function getCMS($page, $part, $id, $deftext = "Please add text")
	{
		$cmskey = "{$page}-{$part}-{$id}";
		$cmsinfo = mysqli_query($this->dbCon, "SELECT `cms` FROM cms WHERE cmskey='$cmskey'");
		$cmsinfo = mysqli_fetch_object($cmsinfo);
		if ($cmsinfo) {
			$sl = (int) strlen(strip_tags($cmsinfo->cms));
			if ($sl) {
				return $cmsinfo->cms;
			} else {
				return $deftext;
			}
		} else {
			return $deftext;
		}
	}

	public  function cmsinfo($id, $deftext = "Please add text")
	{
		$cmsinfo = mysqli_query($this->dbCon, "SELECT `cms` FROM cms WHERE  id='$id'");
		$cmsinfo = mysqli_fetch_object($cmsinfo);
		if ($cmsinfo) {
			$sl = (int) strlen(strip_tags($cmsinfo->cms));
			if ($sl) {
				return $cmsinfo->cms;
			} else {
				return $deftext;
			}
		} else {
			return $deftext;
		}
	}

	public  function get_cms($cmskey, $deftext = "Please add text")
	{
		$cmsinfo = mysqli_query($this->dbCon, "SELECT `cms` FROM cms WHERE  cmskey='$cmskey'");
		$cmsinfo = mysqli_fetch_object($cmsinfo);
		if ($cmsinfo) {
			$sl = (int) strlen(strip_tags($cmsinfo->cms));
			if ($sl) {
				return $cmsinfo->cms;
			} else {
				return $deftext;
			}
		} else {
			return $deftext;
		}
	}



	public function GetParentMenuName($pname)
	{
		$val = '';
		$result = mysqli_query($this->dbCon, "select menutitle,shortname from pages where shortname='$pname' LIMIT 0,1");
		$pnm = mysqli_fetch_array($result);
		$val = $pnm['menutitle'];
		if ($val) {
			return $val;
		} else {
			return "Top Menu (Home)";
		}
	}
	public function LoadPageInfo($shortname)
	{
		$results = mysqli_query($this->dbCon, "select * from pages where shortname='$shortname' OR pageid='$shortname' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}

	public function PageInfo($shortname)
	{
		$results = mysqli_query($this->dbCon, "select * from pages where shortname='$shortname' OR pageid='$shortname' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}

	// SEO Helper Methods
	public function getPageSEOTitle($pageInfo)
	{
		if ($pageInfo && !empty($pageInfo->title)) {
			$siteTitle = $this->getSiteInfo('title');
			return $pageInfo->title . ' - ' . $siteTitle;
		}
		return $this->getSiteInfo('title');
	}

	public function getPageMetaDescription($pageInfo)
	{
		if ($pageInfo && !empty($pageInfo->metades)) {
			return $pageInfo->metades;
		}
		
		// Fallback to excerpt or default description
		if ($pageInfo && !empty($pageInfo->excerpt)) {
			return strip_tags($pageInfo->excerpt);
		}
		
		return $this->getSiteInfo('site_description');
	}

	public function getPageMetaKeywords($pageInfo)
	{
		if ($pageInfo && !empty($pageInfo->metakey)) {
			return $pageInfo->metakey;
		}
		return $this->getSiteInfo('site_keywords');
	}

	public function getCanonicalUrl($shortname = '')
	{
		$domain = $this->getSiteInfo('domain');
		$domain = rtrim($domain, '/');
		
		if (empty($shortname) || $shortname === 'home') {
			return $domain . '/';
		}
		
		return $domain . '/pages/' . $shortname;
	}

	public function getOGImageUrl($pageInfo = null)
	{
		$domain = $this->getSiteInfo('domain');
		$domain = rtrim($domain, '/');
		
		if ($pageInfo && !empty($pageInfo->photo)) {
			return $domain . '/' . ltrim($pageInfo->photo, '/');
		}
		
		// Fallback to default OG image
		$defaultOGImage = $this->getSiteInfo('og_default_image');
		if ($defaultOGImage) {
			return $domain . '/' . ltrim($defaultOGImage, '/');
		}
		
		return $domain . '/templates/assets/images/logo.png';
	}

	public function generateStructuredData($pageInfo = null)
	{
		$siteName = $this->getSiteInfo('title');
		$domain = $this->getSiteInfo('domain');
		
		$structuredData = [
			"@context" => "https://schema.org",
			"@type" => "WebSite",
			"name" => $siteName,
			"url" => $domain,
			"potentialAction" => [
				"@type" => "SearchAction",
				"target" => [
					"@type" => "EntryPoint",
					"urlTemplate" => $domain . "/search?q={search_term_string}"
				],
				"query-input" => "required name=search_term_string"
			]
		];

		if ($pageInfo) {
			$structuredData = [
				"@context" => "https://schema.org",
				"@type" => "WebPage",
				"name" => $pageInfo->title,
				"description" => $this->getPageMetaDescription($pageInfo),
				"url" => $this->getCanonicalUrl($pageInfo->shortname),
				"isPartOf" => [
					"@type" => "WebSite",
					"name" => $siteName,
					"url" => $domain
				]
			];
		}

		return json_encode($structuredData, JSON_UNESCAPED_SLASHES);
	}

	public function DeletePage($pid)
	{
		$result = mysqli_query($this->dbCon, "delete pages.* from pages where pageid='$pid' OR shortname='$pid'");
		return $result;
	}





	public function AdminListVisitors()
	{
		$AdminListVisitors = mysqli_query($this->dbCon, "SELECT * FROM activities");
		return $AdminListVisitors;
	}

	public function AdminListMembers()
	{
		$AdminListMembers = mysqli_query($this->dbCon, "SELECT * FROM members ORDER BY id DESC");
		return $AdminListMembers;
	}

	public function AdminListUnapprovedMembers()
	{
		$AdminListUnapprovedMembers = mysqli_query($this->dbCon, "SELECT * FROM members WHERE approved='0' ORDER BY id DESC");
		return $AdminListUnapprovedMembers;
	}

	public function AdminListApprovedMembers()
	{
		$AdminListApprovedMembers = mysqli_query($this->dbCon, "SELECT * FROM members WHERE approved='1' ORDER BY id DESC");
		return $AdminListApprovedMembers;
	}

	public  function MemberInfo($id)
	{
		$MemberInfo = mysqli_query($this->dbCon, "SELECT * FROM members WHERE email='$id' OR id='$id'");
		$MemberInfo = mysqli_fetch_object($MemberInfo);
		return $MemberInfo;
	}


	public  function GetIdsOfMembers()
	{
		$members = [];
		$GetIdsOfMembers = mysqli_query($this->dbCon, "SELECT id FROM members");
		while ($member = mysqli_fetch_object($GetIdsOfMembers)) {
			$members[] = $member->id;
		}
		return $members;
	}

	public function AdminListDonations()
	{
		$AdminListDonations = mysqli_query($this->dbCon, "SELECT * FROM donations ORDER BY id DESC");
		return $AdminListDonations;
	}

	public function AdminListProjects()
	{
		$AdminListProjects = mysqli_query($this->dbCon, "SELECT * FROM dues ORDER BY id DESC");
		return $AdminListProjects;
	}

	public  function ProjectInfo($id)
	{
		$ProjectInfo = mysqli_query($this->dbCon, "SELECT * FROM dues WHERE id='$id'");
		$ProjectInfo = mysqli_fetch_object($ProjectInfo);
		return $ProjectInfo;
	}


	public  function PaidMembers($id)
	{
		$Project = $this->ProjectInfo($id);
		$notowning = [];
		$Members = $this->GetIdsOfMembers();
		$Unpaid = json_decode($Project->unpaid_members);
		$Paid = json_decode($Project->paid_members);
		foreach ($Members as $member) {
			if (!in_array($member, $Unpaid) && in_array($member, $Paid)) {
				$notowning[] = $member;
			}
		}
		return (int)count($notowning);
	}


	public  function UnpaidMembers($id)
	{
		$Project = $this->ProjectInfo($id);
		$owning = [];
		$Members = $this->GetIdsOfMembers();
		$Unpaid = json_decode($Project->unpaid_members);
		$Paid = json_decode($Project->paid_members);
		foreach ($Members as $member) {
			if (in_array($member, $Unpaid) && !in_array($member, $Paid)) {
				$owning[] = $member;
			}
		}
		return (int)count($owning);
	}

}
