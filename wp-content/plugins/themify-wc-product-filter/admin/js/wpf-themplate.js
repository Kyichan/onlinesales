var WPF;!function($,e,t,i,a){"use strict";WPF={prefix:"wpf_",template_type:!1,init(e){e=$.extend({prefix:this.prefix,template_type:this.template_type},e),this.prefix=e.prefix,this.template_type=e.template_type,this.Undelegate(),this.bindEvents()},Undelegate(){$(t).off("change click")},bindEvents(){this.SetupColors(),this.InitDraggable(),this.InitSortable(),this.ShowHide(),this.Unique($("#"+this.prefix+"module_content ."+this.prefix+"back_active_module_content")),this.Open(),this.Delete(),this.Save(),this.ShowThemplates(),this.AddItem(),this.RemmoveItem(),this.multiLanguages(),$.event.trigger("WPF.template_load",this.template_type)},PlaceHoldDragger(){$("."+WPF.prefix+"module_holder").each((function(){var e=$(this).find("."+WPF.prefix+"empty_holder_text");0===$(this).find("."+WPF.prefix+"active_module").length?e.show():e.hide()}))},InitDraggable(){var e=this;$("."+e.prefix+"back_module_panel ."+e.prefix+"back_module").draggable({appendTo:"body",helper:"clone",revert:"invalid",snapMode:"inner",connectToSortable:"."+e.prefix+"module_holder",stop(t,i){var a=$(i.helper[0]),o=a.data("type");if($("#"+e.prefix+"module_content").find('[data-type="'+o+'"]').length>0){$("#"+e.prefix+"cmb_"+o).hide(),$.event.trigger("WPF.template_drag_start",[a,i,e.template_type]),e.Unique(a);var s=a.find("."+e.prefix+"color_picker");e.DestroyInputColor(s),e.SetInputColor(s),a.find("."+e.prefix+"toggle_module").trigger("click"),$.event.trigger("WPF.template_drag_end",[a,i,e.template_type])}}})},InitSortable(){var e=this;$("."+e.prefix+"module_holder").sortable({placeholder:e.prefix+"ui_state_highlight",items:"."+e.prefix+"back_module",connectWith:"."+e.prefix+"module_holder",cursor:"move",revert:100,axis:"y",cancel:".wpf_active_module",sort(t,i){var a=i.item.outerHeight();$("."+e.prefix+"module_holder ."+e.prefix+"ui_state_highlight").height(a)},receive(t,i){e.PlaceHoldDragger(),$(this).parent().find("."+e.prefix+"empty_holder_text").hide(),$(i.item).removeClass("dragged")},start(t,i){$(i.item).removeClass(e.prefix+"dragged")},stop(t,i){$(i.item).addClass(e.prefix+"dragged")}}),$("."+e.prefix+"back_active_module_add").sortable({placeholder:e.prefix+"ui_state_highlight",items:"li",connectWith:"parent",cursor:"move",revert:100,axis:"y"})},ShowHide(){$("#"+WPF.prefix+"lightbox_container").on("change","."+WPF.prefix+"changed input,."+WPF.prefix+"changed select",(function(){var e,t=!0;if($(this).closest("."+WPF.prefix+"show_icons").length&&!$(this).closest("."+WPF.prefix+"items_container").length)e=$(this).closest("."+WPF.prefix+"show_icons").find("."+WPF.prefix+"items_container"),t=$(this).is(":checked");else if($(this).closest("."+WPF.prefix+"result_page_wrapper").length>0&&("wpf_diff_page"==this.id||"wpf_same_page"==this.id))e=$(this).closest("."+WPF.prefix+"result_page_wrapper").find("."+WPF.prefix+"result_page_select"),t="diff_page"===$(this).val();else if($(this).closest("."+WPF.prefix+"grid").length>0)e=$("#"+WPF.prefix+"group_fields").closest("."+WPF.prefix+"lightbox_row"),t="vertical"===$(this).val();else if($(this).closest("."+WPF.prefix+"order").length>0)e=$(this).closest("."+WPF.prefix+"order").next("."+WPF.prefix+"orderby"),t="term_order"!==$(this).val();else if($(this).closest("."+WPF.prefix+"show_range").length>0){var i=$(this).closest("."+WPF.prefix+"back_active_module_row"),o=i.next("."+WPF.prefix+"group"),s=i.nextAll("."+WPF.prefix+"slider");"group"===$(this).val()?(s.slideUp(),o.slideDown()):(o.slideUp(),s.slideDown())}else if($(this).closest("."+WPF.prefix+"display_as").length>0){e=$(this).closest("."+WPF.prefix+"back_active_module_content").find("."+WPF.prefix+"icons_block");var n=$(this).val();t="checkbox"===n||"radio"===n,"dropdown"===n||"radio"===n?$(this).closest("."+WPF.prefix+"back_active_module_content").find("."+WPF.prefix+"show_all_block").show():$(this).closest("."+WPF.prefix+"back_active_module_content").find("."+WPF.prefix+"show_all_block").hide()}else"wpf_pagination_fields"===$(this).prop("id")?(e=$(".wpf_infinity"),t=!$(this).is(":checked")):"pagination_type"===$(this).prop("name")&&("infinity_auto"===$(this).val()?$(".wpf_lightbox_row.wpf_infinity_buffer").show():$(".wpf_lightbox_row.wpf_infinity_buffer").hide());a!==e&&(t?e.slideDown():e.slideUp())})),$("."+WPF.prefix+"changed input:checked,."+WPF.prefix+"changed option:selected").trigger("change")},Open(){var e=this;$(t).on("click","."+e.prefix+"toggle_module",(function(t){var i=$(this).closest("."+e.prefix+"back_module").find("."+e.prefix+"back_active_module_content");if($(this).hasClass(e.prefix+"opened")||i.is(":visible"))$(this).removeClass(e.prefix+"opened"),i.slideUp();else{$(this).addClass(e.prefix+"opened"),i.slideDown();const t=i.data("type");if("wpf_cat"===t||"wpf_tag"===t){const e=i[0].getElementsByClassName("wpf_tax_items");if(e[0]&&e[0].dataset.url){const a=i[0].querySelector('input[name="['+t+'][color]"]');a.checked?WPF.getTax(e[0]):a.addEventListener("change",(()=>{WPF.getTax(e[0])}),{once:!0})}}}t.preventDefault()}))},Delete(){$(t).on("click","."+WPF.prefix+"delete_module",(function(e){if(e.preventDefault(),confirm(i.module_delete)){var t=$(this).closest("."+WPF.prefix+"back_module");$("#"+WPF.prefix+"cmb_"+t.data("type")).show(),t.remove(),WPF.PlaceHoldDragger()}}))},Save(){var e=this;$("#"+e.prefix+"submit").on("click",(function(t){var i=$(this).closest("form"),a=$("."+e.prefix+"back_builder").find("input,select,textarea");a.prop("disabled",!0),setTimeout((()=>{var t=e.ParseData();$.event.trigger("WPF.before_template_save",t);t=JSON.stringify(t);$("#"+e.prefix+"layout").val(t),$.ajax({url:i.prop("action"),method:"POST",dataType:"json",data:i.serialize(),beforeSend(){i.removeClass(e.prefix+"done").addClass(e.prefix+"save")},complete(){a.prop("disabled",!1),i.removeClass(e.prefix+"save").addClass(e.prefix+"done")},success(t){t&&"1"==t.status&&(i.find("#"+e.prefix+"themplate_id").val(t.id),$("#"+e.prefix+"success_text").html("<p><strong>"+t.text+"</strong></p>").show(),setTimeout((()=>{$("#"+e.prefix+"success_text").html("").hide()}),2e3),$.event.trigger("WPF.after_template_save"))}})}),100),t.preventDefault()}))},ParseData(){var e=$("#"+WPF.prefix+"module_content"),t={};return e.find("."+WPF.prefix+"back_active_module_content").each((function(){var e=$(this).data("type");t[e]={},$(this).find('input:checked,input[type="text"],input[type="number"],input[type="hidden"],textarea,select').each((function(){var i=$(this).attr("name");if(i){var a=i.split("]");if(a){a.pop();var o,s=[];for(var n in a){var r=a[n].split("[");r[1]&&(s[n]=r[1])}if((o="arr"==s[2])||t[e][s[1]]&&!s[2])if(o)t[e][s[1]]=$(this).val(),t[e][s[1]]||(t[e][s[1]]=[]);else{if("object"!=typeof t[e][s[0]]&&"object"!=typeof t[e][s[1]]){var c=t[e][s[1]];t[e][s[1]]=[],t[e][s[1]][0]=c}t[e][s[1]].push($(this).val())}else if(s[2]){var l=s[2];"object"!=typeof t[e][s[1]]&&(t[e][s[1]]={}),t[e][s[1]][l]=$(this).val()}else{var _=!1;_=$(this).hasClass(WPF.prefix+"color_picker")?!("rgba(0, 0, 0, 1)"==(_=$(this).minicolors("rgbaString"))&&!$(this).val())&&_:"on"==$(this).val()||$(this).val(),t[e][s[1]]=_}}}}))})),t},Unique(e){e.each((function(){var e=$(this);e.find("label").each((function(){var t=$(this).attr("for");if(t&&(t=WPF.Escape($(this).attr("for")),$("#"+t).length>0)){var i=WPF.GenerateUnique();e.find("#"+t).attr("id",i),$(this).attr("for",i)}}));var t=/.*?\[(.+?)\]/gi,i=e.find('input[type="radio"]'),a={};for(var o in i.each((function(e){var t=$(this).attr("name");t&&(a[t]=1)})),a){var s=o.match(t);if(s){var n=WPF.GenerateUnique(),r=e.find('input:radio[name="'+o+'"]'),c=n+s[0]+s[1];r.attr("name",c),e.find('input:radio[name!="'+o+'"]')&&e.find('input:radio[name="'+c+'"][checked]').prop("checked",!0)}}}))},GenerateUnique(){return WPF.prefix+Math.random().toString(36).substr(2,9)},Escape(e){return e.replace(/(:|\.|\[|\]|,)/g,"\\$1")},SetupColors(){$("#"+WPF.prefix+"module_content").find("."+WPF.prefix+"color_picker").each((function(){var e=WPF.RgbaToHex($(this).data("value"));e&&-1!==e.indexOf("@")&&(e=e.split("@"),$(this).val(e[0]),$(this).attr("data-opacity",e[1]))})),this.SetInputColor()},SetInputColor(e){e||(e=$("."+WPF.prefix+"color_picker")),e.minicolors({opacity:!0,position:"top right",theme:"default",show(){$("."+WPF.prefix+"module_holder").sortable("disable")},hide(){$("."+WPF.prefix+"module_holder").sortable("enable")},create(e){}})},DestroyInputColor(e){e||(e=$("#"+WPF.prefix+"module_content").find("."+WPF.prefix+"color_picker")),e.minicolors("destroy")},RgbaToHex(e){if(!e)return!1;var t=(e=e.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(.*)[\s+]?\)/i))&&e.length>=3?"#"+("0"+parseInt(e[1],10).toString(16)).slice(-2)+("0"+parseInt(e[2],10).toString(16)).slice(-2)+("0"+parseInt(e[3],10).toString(16)).slice(-2):"";return t&&e[4]&&(t+="@"+e[4]),t},ShowThemplates(){var e=this.prefix;$(t).on("WPF.close_lightbox",((t,a)=>{if($(a).closest(".wpf_admin_lightbox").find("#"+e+"themplate_id").val()){var o=$("#the-list");$.ajax({url:ajaxurl,type:"POST",data:{action:"wpf_get_list",_ajax_nonce:i.nonce},beforeSend(){o.addClass(e+"wait")},complete(){o.removeClass(e+"wait")},success(e){e&&o.replaceWith($(e).find("#the-list"))}})}}))},AddItem(){$("#"+WPF.prefix+"module_content").on("click","."+WPF.prefix+"add_item",(function(e){e.preventDefault();var t=$(this).prev("ul").children("li").first().clone();t.hide().find("input").val(""),$(this).prev("ul").append(t),t.slideDown()}))},RemmoveItem(){$("#"+WPF.prefix+"module_content").on("click","."+WPF.prefix+"remove_item",(function(e){e.preventDefault(),$(this).closest("li").slideUp((function(){$(this).remove()}))}))},multiLanguages(){$("body").on("click",".wpf_language_tabs li",(function(e){e.preventDefault();var t=$(this);if(!t.hasClass("wpf_active_tab_lng")){t.siblings(".wpf_active_tab_lng").removeClass("wpf_active_tab_lng"),t.addClass("wpf_active_tab_lng");var i=t.parents(".wpf_language_tabs").parent().find(".wpf_language_fields");i.find("li").removeClass("wpf_active_lng"),i.find('li[data-lng="'+t.children("a").attr("class")+'"]').addClass("wpf_active_lng")}}))},getTax(e){$.ajax({url:e.dataset.url,success(t){t&&(e.innerHTML=t,e.dataset.url="",WPF.multiLanguages(),WPF.SetupColors())}})}}}(jQuery,window,document,wpf_js);