<?php

return [
    "module_name" => [
        "single" => "Fotoalbum",
        "multiple" => "Fotoalbums"
    ],
    "fields" => [
        "uploads" => [
            "active" => true,
            "type" => "",
            "title" => "Uploads",
            "read" => false,
            "required" => false,
        ],
        "locale" => [
            "active" => false,
            "type" => "text",
            "title" => "Taal",
            "read" => true
        ],
        "title" => [
            "active" => true,
            "type" => "text",
            "title" => "Titel",
            "read" => true
        ],
        "title_2" => [
            "active" => false,
            "type" => "text",
            "title" => "Subtitel",
            "read" => true
        ],
        "slug" => [
            "active" => false,
            "type" => "text",
            "title" => "Slug",
            "read" => true
        ],
        "seo_title" => [
            "active" => false,
            "type" => "text",
            "title" => "SEO titel",
            "read" => true
        ],
        "seo_description" => [
            "active" => false,
            "type" => "text",
            "title" => "SEO omschrijving",
            "read" => true
        ],
        "tags" => [
            "active" => false,
            "type" => "textarea",
            "title" => "Tags",
            "read" => true
        ],
        "excerpt" => [
            "active" => true,
            "type" => "textarea",
            "title" => "Inleiding",
            "read" => true
        ],
        "content" => [
            "active" => false,
            "type" => "editor",
            "title" => "Bericht",
            "read" => true
        ]
    ]
];
