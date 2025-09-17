-- Add SEO-related settings to the settings table
INSERT INTO `settings` (`caption`, `name`, `value`, `type`, `disabled`) VALUES
('Site Meta Description', 'site_description', 'Okpogho Ancient Kingdom - Preserving our heritage and culture for future generations', 'textarea', 0),
('Site Meta Keywords', 'site_keywords', 'Okpogho, ancient kingdom, heritage, culture, community, Nigeria, tradition', 'input', 0),
('Default OG Image', 'og_default_image', '/templates/assets/images/og-default.jpg', 'input', 0),
('Site Mobile Number', 'site_mobile', '+234 000 000 0000', 'input', 0),
('Site Email Address', 'site_email', 'info@okpogho.org', 'input', 0),
('Footer Newsletter Text', 'footer_news_text', 'Subscribe to our newsletter for updates', 'textarea', 0),
('Google Analytics ID', 'google_analytics_id', '', 'input', 0);