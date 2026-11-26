# Coach Theme

A custom, classic WordPress theme for a coaching website. It includes a Tailwind CSS build setup, ACF-powered homepage fields, a reusable image-overlay block, blog templates, and an Events post type.

## Requirements

- WordPress 6.0+
- PHP 7.4+
- Advanced Custom Fields (free) 5.8+ for homepage fields, the image overlay block, and event date/location fields.
- Node.js 18+ to rebuild Tailwind CSS.

## Install

1. Copy this repository into `wp-content/themes/coach-theme` (or download it as a ZIP and upload it under **Appearance → Themes → Add New → Upload Theme**).
2. Activate **Coach Theme**.
3. Install and activate the free **Advanced Custom Fields** plugin. Field groups are registered by the theme and will appear on the front page and event editor.
4. Create or edit a page and set it as the site homepage under **Settings → Reading**. The Homepage content panel includes the hero image, heading, intro, and CTA fields.
5. Add content to the page in Gutenberg. Use **Image with text overlay** to add as many editable image-and-text sections as needed. The block fields are available once ACF is active.
6. Add Events under **Events → Add New**. Blog posts use the standard **Posts** area.
7. Create a navigation menu and assign it to **Primary menu** under **Appearance → Menus**.

## Tailwind CSS development

```sh
npm install
npm run build:css
```

Use `npm run watch:css` while developing. The compiled stylesheet is committed at `assets/css/theme.css` and enqueued by the theme. The PHP `style.css` is the WordPress theme header; authored Tailwind styles are in `src/css/input.css`.

## Notes

- The ACF image-overlay block is registered via ACF's PHP block API and uses free ACF fields. No Pro repeater is needed: add multiple blocks directly in the page editor.
- The Events post type is registered by the theme. Date and location fields require ACF; event content and featured images work through standard WordPress fields.
- After activating the theme, visit **Settings → Permalinks** and click **Save Changes** if the `/events/` archive does not resolve immediately.
- Replace sample homepage defaults and the footer copy with your own brand content.
