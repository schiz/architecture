// closure to avoid namespace collision
(function () {
	// create the plugin
	tinymce.create("tinymce.plugins.wellthemesShortcodes", {	
		
		// creates control instances based on the control's id.
		// our button's id is "wellthemes_button"
		
		createControl: function ( btn, e ) {
			if ( btn == "wellthemes_button" ) {	
				
				var a = this;
				
				// creates the button
				var btn = e.createSplitButton('wellthemes_button', {
                    title: "Insert Shortcodes", // title of the button
					image: wellthemesShortCodes.plugin_folder +"/tinymce/images/icon.png", // path to the button's image
					icons: false
                });
				
				//Render a DropDown Menu
                btn.onRenderMenu.add(function (c, b) {

                    c = b.addMenu({
                        title: "Home"
                    });
                    a.addImmediate( c, "Wide Banner", "[wide_banner heading='PERFETTO' subheading='Just a site templates' button='Buy It' url='#']Your contents will goes here...[/wide_banner]" );
                    a.addImmediate( c, "Team Member", "[team heading='Our Team' subheading='Senior Member' posts_per_page='4'][/team]" );
                    a.addImmediate( c, "Recent Work", "[recent_work heading='Recent Work' subheading='Latest From Portfolio' posts_per_page='4'][/recent_work]" );
                    a.addImmediate( c, "Recent Posts", "[home_posts heading='Recent Posts' subheading='Recent From Blog' posts_per_page='4'][/home_posts]" );
                    a.addImmediate( c, "Feature Posts", "[featured_posts heading='Featured Posts' posts_per_page='2'][/featured_posts]" );
                    a.addImmediate( c, "Popular Posts", "[popular_posts heading='Popular Posts' posts_per_page='1'][/popular_posts]" );
                    a.addImmediate( c, "Our Clients", "[clients heading='Our Partners'][/clients]" );
                    a.addImmediate( c, "Our Services 1", "[services heading='Our Services' subheading='So What We Do' posts_per_page='4'][/services]" );
                    a.addImmediate( c, "Our Services 2", "[services heading='Our Services' subheading='So What We Do' posts_per_page='4' style='b'][/services]" );

                    c = b.addMenu({
                        title: "Message Boxes"
                    });
                    a.addImmediate( c, "Error", "[box type='error' heading='Error!' btn='Take this Action' url='#']Content goes here... [/box]");
                    a.addImmediate( c, "Warning", "[box type='warning' heading='Warning!' btn='Take this Action' url='#']Content goes here... [/box]");
                    a.addImmediate( c, "Success", "[box type='success' heading='Success' btn='Take this Action' url='#']Content goes here... [/box]");

                    c = b.addMenu({
                        title: "Buttons"
                    });
                    a.addImmediate( c, "Default", "[button url='#']Button[/button]");
                    a.addImmediate( c, "Default Primary", "[button url='#' primary='yes']Button[/button]");
                    a.addImmediate( c, "Large", "[button url='#' size='large']Button[/button]");
                    a.addImmediate( c, "Large Primary", "[button url='#' size='large' primary='yes']Button[/button]");
                    a.addImmediate( c, "Small", "[button url='#' size='small']Button[/button]");
                    a.addImmediate( c, "small Primary", "[button url='#' size='small' primary='yes']Button[/button]");

                    c = b.addMenu({
                        title: "Skills"
                    });
                    a.addImmediate( c, "Default Bar", "[skill value='75%']Contents goes here...[/skill]");
                    a.addImmediate( c, "Black Bar", "[skill value='60%' style='black']Contents goes here...[/skill]");
                    a.addImmediate( c, "Two Color Bar", "[skill value='70%' style='two-color']Contents goes here...[/skill]");

                    c = b.addMenu({
                        title: "Columns"
                    });
                    a.addImmediate( c, "Col Row", "[pixel_column_row]Insert Column Shortcodes Here...[/pixel_column_row]");
                    a.addImmediate( c, "Col 1/2", "[pixel_one_half]Contents goes here...[/pixel_one_half]");
                    a.addImmediate( c, "Col 1/3", "[pixel_one_third]Contents goes here...[/pixel_one_third]");
                    a.addImmediate( c, "Col 2/3", "[pixel_two_third]Contents goes here...[/pixel_two_third]");
                    a.addImmediate( c, "Col 1/4", "[pixel_one_fourth]Contents goes here...[/pixel_one_fourth]");
                    a.addImmediate( c, "Col 3/4", "[pixel_three_fourth]Contents goes here...[/pixel_three_fourth]");
                    a.addImmediate( c, "Col 1/6", "[pixel_one_sixth]Contents goes here...[/pixel_one_sixth]");

                    a.addImmediate( b, "Lightbox Image", "[lightbox_image src='Thumbnail image source' bigsrc='Full Size image source' alt='Image'][/lightbox_image]" );

                    c = b.addMenu({
                        title: "Tooltips"
                    });
                    a.addImmediate( c, "TT Right", "[tooltip position='right' tiptext='Tooltip Text']Text will goes here...[/tooltip]");
                    a.addImmediate( c, "TT Left", "[tooltip position='left' tiptext='Tooltip Text']Text will goes here...[/tooltip]");
                    a.addImmediate( c, "TT Top", "[tooltip position='top' tiptext='Tooltip Text']Text will goes here...[/tooltip]");
                    a.addImmediate( c, "TT Bottom", "[tooltip position='bottom' tiptext='Tooltip Text']Text will goes here...[/tooltip]");

                    c = b.addMenu({
                        title: "Popovers"
                    });
                    a.addImmediate( c, "PO Right", "[popover position='right' title='Popover' poptext='Lorem ipsum dolor sit amet']Text will goes here...[/popover]");
                    a.addImmediate( c, "PO Left", "[popover position='left' title='Popover' poptext='Lorem ipsum dolor sit amet']Text will goes here...[/popover]");
                    a.addImmediate( c, "PO Top", "[popover position='top' title='Popover' poptext='Lorem ipsum dolor sit amet']Text will goes here...[/popover]");
                    a.addImmediate( c, "PO Bottom", "[popover position='bottom' title='Popover' poptext='Lorem ipsum dolor sit amet']Text will goes here...[/popover]");

                    a.addImmediate( b, "Accordions", "[accordion_group][accordion id='1' heading='An Accordion Heading']Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.[/accordion][accordion id='2' heading='An Accordion Heading']Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.[/accordion][accordion id='3' heading='An Accordion Heading']Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.[/accordion][/accordion_group]" );

                });
                
                return btn;
			}
			
			return null;
		},		
		
		//Insert shortcode into content
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		
		// credits
		getInfo: function () {
			return {
				longname : "Pixel Art Shortcodes",
				author : 'Umair Chaudary',
				authorurl : 'http://pixelartinc.com/',
				infourl : 'http://pixelartinc.com/',
				version : "1.0"
			};
		}
	});
	
	// add wellthemes plugin
	tinymce.PluginManager.add("wellthemesShortcodes", tinymce.plugins.wellthemesShortcodes);
})();