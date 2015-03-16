<?php

function ckeditor_render($html = '', $ckid = 'CKEditor1') {

    include_once 'assets/grocery_crud/texteditor/ckeditor/ckeditor.php';
    require_once 'assets/grocery_crud/texteditor/ckfinder/ckfinder.php';

    // This is a check for the CKEditor class. If not defined, the paths in lines 57 and 70 must be checked.
    if (!class_exists('CKEditor')) {
        printNotFound('CKEditor');
    } else {

        $ckeditor = new CKEditor( );
        $ckeditor->basePath = asset_url() . '/grocery_crud/texteditor/ckeditor/';

        // Just call CKFinder::SetupCKEditor before calling editor(), replace() or replaceAll()
        // in CKEditor. The second parameter (optional), is the path for the
        // CKFinder installation (default = "/ckfinder/").
        CKFinder::SetupCKEditor($ckeditor, asset_url() . '/grocery_crud/texteditor/ckfinder/');

        $ckeditor->editor($ckid, $html, array('height' => '430px'));
    }
}
