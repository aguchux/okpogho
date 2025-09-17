<?php
// Add this to the admin routes if needed
// Simple SEO settings management page

if (isset($_GET['seo-settings'])) {
    $Core = new Apps\Core;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Update SEO settings
        $settings = [
            'site_description',
            'site_keywords', 
            'og_default_image',
            'google_analytics_id'
        ];
        
        foreach ($settings as $setting) {
            if (isset($_POST[$setting])) {
                $Core->setSiteInfo($setting, $_POST[$setting]);
            }
        }
        
        echo "<script>alert('SEO settings updated successfully!');</script>";
    }
    
    // Get current settings
    $siteDescription = $Core->getSiteInfo('site_description');
    $siteKeywords = $Core->getSiteInfo('site_keywords');
    $ogImage = $Core->getSiteInfo('og_default_image');
    $gaId = $Core->getSiteInfo('google_analytics_id');
    
    ?>
    <div class="container-fluid">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">SEO Settings</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="site_description">Site Meta Description</label>
                                <textarea name="site_description" id="site_description" class="form-control" rows="3"><?= htmlspecialchars($siteDescription) ?></textarea>
                            </div>
                            
                            <div class="col-12 form-group">
                                <label for="site_keywords">Site Keywords</label>
                                <input name="site_keywords" id="site_keywords" class="form-control" value="<?= htmlspecialchars($siteKeywords) ?>">
                            </div>
                            
                            <div class="col-12 form-group">
                                <label for="og_default_image">Default OG Image Path</label>
                                <input name="og_default_image" id="og_default_image" class="form-control" value="<?= htmlspecialchars($ogImage) ?>">
                                <small class="text-muted">Recommended: 1200x630px image</small>
                            </div>
                            
                            <div class="col-12 form-group">
                                <label for="google_analytics_id">Google Analytics Tracking ID</label>
                                <input name="google_analytics_id" id="google_analytics_id" class="form-control" value="<?= htmlspecialchars($gaId) ?>" placeholder="GA-XXXXXXXXX-X">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update SEO Settings</button>
                                <a href="/admin" class="btn btn-secondary">Back to Dashboard</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="card-title">SEO Tools</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Sitemap</h6>
                            <p>Your sitemap is automatically generated at:</p>
                            <a href="/sitemap.xml" target="_blank" class="btn btn-outline-primary">View Sitemap.xml</a>
                        </div>
                        <div class="col-md-6">
                            <h6>Social Media Testing</h6>
                            <a href="https://developers.facebook.com/tools/debug/" target="_blank" class="btn btn-outline-info btn-sm">Facebook Debugger</a>
                            <a href="https://cards-dev.twitter.com/validator" target="_blank" class="btn btn-outline-info btn-sm">Twitter Card Validator</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    exit;
}
?>