/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

       var baseUrl ="http://localhost/FinalPresentation/public/";
	config.filebrowserBrowseUrl = baseUrl+'ckfinder/ckfinder.html';
 
config.filebrowserImageBrowseUrl =  baseUrl+'ckfinder/ckfinder.html?type=Images';
 
config.filebrowserFlashBrowseUrl = baseUrl+'ckfinder/ckfinder.html?type=Flash';
 
config.filebrowserUploadUrl = baseUrl+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
 
config.filebrowserImageUploadUrl = baseUrl+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
 
config.filebrowserFlashUploadUrl = baseUrl+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
    
};
