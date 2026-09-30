<?php
/** Inline SVG ikony (čiarové, farbia sa cez currentColor). */
function icon(string $name, string $class = 'icon'): string
{
    $paths = [
        'industrial' => '<path d="M3 21V9l6-4v4l6-4v4l6-4v16z"/><path d="M7 21v-6h10v6"/><path d="M7 18h10"/>',
        'garage'     => '<path d="M3 21V9l9-6 9 6v12"/><path d="M6 21v-9h12v9"/><path d="M6 15h12M6 18h12"/>',
        'blinds'     => '<rect x="3" y="3" width="18" height="4" rx="1"/><path d="M5 7v10h14V7"/><path d="M5 10h14M5 13h14M5 16h14"/><path d="M12 17v4"/>',
        'truck'      => '<path d="M1 16V5h13v11"/><path d="M14 9h4l4 4v3h-8"/><circle cx="6" cy="18" r="2"/><circle cx="18" cy="18" r="2"/>',
        'barrier'    => '<rect x="2" y="12" width="4" height="9" rx="1"/><path d="M6 13l16-6"/><path d="M10 11.5l1.5 2M14 10l1.5 2M18 8.5l1.5 2"/><path d="M1 21h22"/>',
        'wrench'     => '<path d="M14.7 6.3a4 4 0 0 0-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 0 0 5.4-5.4l-2.5 2.5-2.5-.5-.5-2.5z"/>',
        'shield'     => '<path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6z"/><path d="M9 12l2 2 4-4"/>',
        'clock'      => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/>',
        'ruler'      => '<path d="M3 17L17 3l4 4L7 21z"/><path d="M7 13l2 2M10 10l2 2M13 7l2 2"/>',
        'phone'      => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/>',
        'mail'       => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6l-10 7L2 6"/>',
        'pin'        => '<path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>',
        'check'      => '<path d="M20 6L9 17l-5-5"/>',
        'arrow'      => '<path d="M5 12h14M13 5l7 7-7 7"/>',
        'instagram'  => '<rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".8" fill="currentColor"/>',
        'facebook'   => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
        'users'      => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/>',
        'chat'       => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
        'tool'       => '<path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/>',
        'door'       => '<path d="M5 21V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v17"/><path d="M3 21h18"/><path d="M8 7h8v5H8z"/><circle cx="15.5" cy="15" r=".9" fill="currentColor"/>',
        'weld'       => '<path d="M3 21h18"/><path d="M5 21V11h14v10"/><path d="M9 11V7M15 11V7M7 7h10"/><path d="M12 3l1 2M16.5 4.5l-1.5 1.5M7.5 4.5L9 6"/>',
        'smart'      => '<path d="M3 11l9-7 9 7"/><path d="M5 10v10h14V10"/><path d="M9.5 15.5a3.5 3.5 0 0 1 5 0"/><path d="M7.8 13.3a6 6 0 0 1 8.4 0"/><circle cx="12" cy="17.6" r=".8" fill="currentColor"/>',
        'quote'      => '<path d="M10 11H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6a6 6 0 0 1-6 6"/><path d="M20 11h-4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6a6 6 0 0 1-6 6"/>',
        'up'         =>'<path d="M12 19V5M5 12l7-7 7 7"/>',
    ];
    $svg = $paths[$name] ?? '';
    return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $svg . '</svg>';
}
