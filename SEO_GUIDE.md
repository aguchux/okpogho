# SEO Implementation Guide for Okpogho Website

## Overview
This guide explains the SEO improvements implemented for production readiness.

## Changes Made

### 1. Meta Tags Enhancement
- **Title Tags**: Dynamic SEO-optimized titles with site name
- **Meta Descriptions**: Page-specific descriptions with fallbacks
- **Meta Keywords**: Page-specific keywords
- **Canonical URLs**: Proper canonical links to prevent duplicate content
- **Robots Meta**: Index and follow directives

### 2. Social Media Integration
- **Open Graph Tags**: Complete OG implementation for Facebook/LinkedIn sharing
- **Twitter Cards**: Summary large image cards for Twitter
- **Social Images**: Dynamic OG image selection with fallbacks

### 3. Structured Data
- **JSON-LD Schema**: WebSite and WebPage markup for search engines
- **Organization Data**: Helps search engines understand the site structure

### 4. Technical SEO
- **Robots.txt**: Production-ready with proper disallow rules
- **Sitemap.xml**: Dynamic XML sitemap generation at /sitemap.xml
- **Manifest.json**: PWA support for mobile users
- **Google Analytics**: Ready for tracking code integration

## Database Setup

Run the following SQL to add SEO settings:

```sql
-- Execute seo_settings.sql
INSERT INTO `settings` (`caption`, `name`, `value`, `type`, `disabled`) VALUES
('Site Meta Description', 'site_description', 'Okpogho Ancient Kingdom - Preserving our heritage and culture for future generations', 'textarea', 0),
('Site Meta Keywords', 'site_keywords', 'Okpogho, ancient kingdom, heritage, culture, community, Nigeria, tradition', 'input', 0),
('Default OG Image', 'og_default_image', '/templates/assets/images/og-default.jpg', 'input', 0),
('Google Analytics ID', 'google_analytics_id', '', 'input', 0);
```

## How to Configure

### 1. Global SEO Settings
Update these in the admin panel or database:
- `site_description`: Main site description
- `site_keywords`: Default keywords
- `og_default_image`: Default image for social sharing
- `google_analytics_id`: Google Analytics tracking ID (e.g., GA-XXXXXXXXX-X)

### 2. Page-Level SEO
Each page can have custom:
- `metades`: Page-specific meta description
- `metakey`: Page-specific keywords
- `photo`: Page-specific social sharing image

### 3. Required Assets
Create these image files for optimal SEO:
- `/templates/assets/images/favicon.ico`
- `/templates/assets/images/apple-touch-icon.png`
- `/templates/assets/images/og-default.jpg` (1200x630px recommended)
- `/templates/assets/images/icon-192.png`
- `/templates/assets/images/icon-512.png`

## Testing Your SEO

### 1. Validate Markup
- HTML Validator: https://validator.w3.org/
- Schema.org Validator: https://validator.schema.org/

### 2. Social Media Testing
- Facebook Debugger: https://developers.facebook.com/tools/debug/
- Twitter Card Validator: https://cards-dev.twitter.com/validator

### 3. Search Engine Testing
- Google Search Console
- Google PageSpeed Insights
- Google Mobile-Friendly Test

## Production Checklist

- [ ] Run `seo_settings.sql` on production database
- [ ] Add Google Analytics tracking ID
- [ ] Upload required images (favicon, OG image, PWA icons)
- [ ] Verify sitemap.xml is accessible at domain.com/sitemap.xml
- [ ] Submit sitemap to Google Search Console
- [ ] Test social media sharing
- [ ] Verify structured data in Google Rich Results Test

## Maintenance

### Regular Tasks
- Update meta descriptions for new pages
- Monitor search performance in Search Console
- Update OG images for important pages
- Review and update keywords based on analytics

### Optional Enhancements
- Add breadcrumb structured data
- Implement FAQ schema for relevant pages
- Add local business schema if applicable
- Set up Google Search Console integration