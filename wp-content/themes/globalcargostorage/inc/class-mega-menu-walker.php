<?php

class Mega_Menu_Walker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = null) {
        if ($depth === 0) {
            $output .= '<ul class="dropdown-menu megamenu"><div class="row">';
        } else {
            $output .= '<ul class="list-unstyled">';
        }
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        if ($depth === 0) {
            $output .= '</div></ul>';
        } else {
            $output .= '</ul>';
        }
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {

        // 🔹 Get icon from ACF (menu item)
        $icon = get_field('menu_icon', $item);

        $icon_html = '';
        if ($icon) {
            $icon_html = '<i class="' . esc_attr($icon) . ' mr-1"></i>';
        }

        /* =========================
           TOP LEVEL
           ========================= */
        if ($depth === 0) {

            $output .= '<li class="nav-item dropdown menu-large">';
            $output .= '<a href="' . esc_url($item->url) . '" class="nav-link">';
            $output .= $icon_html . esc_html($item->title);
            $output .= '</a>';

        }

        /* =========================
           COLUMN HEADER (DEPTH 1)
           ========================= */
        elseif ($depth === 1) {

            $output .= '<div class="col-md-3">';
            $output .= '<h6 class="dropdown-header">';
            $output .= $icon_html . esc_html($item->title);
            $output .= '</h6>';
            $output .= '<ul class="list-unstyled">';

        }

        /* =========================
           LINKS (DEPTH 2)
           ========================= */
        elseif ($depth === 2) {

            $output .= '<li>';
            $output .= '<a href="' . esc_url($item->url) . '">';
            $output .= $icon_html . esc_html($item->title);
            $output .= '</a>';
            $output .= '</li>';

        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        if ($depth === 1) {
            $output .= '</ul></div>';
        }
        if ($depth === 0) {
            $output .= '</li>';
        }
    }
}
