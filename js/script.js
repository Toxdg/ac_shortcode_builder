;(function($){
    $(window).load(function() {

    });
    $(document).ready(function(){  
        if ( $( "#ac_shortcode_builder" ).length ) {
            $('.generate_shortcode').on( "click", function(event) {           
                build_shortcode($(this).data('form'));
            });
            build_select();
            $('.generate_shortcode').each(function(){
                $(this).addClass('button');
                $(this).addClass('button-primary');
            });
        }

        
        function build_shortcode($element){
            var obj = {};
            var shortcode = $('#'+$element+' div.final').html();
            var return_text = $('#'+$element+' .output');
            return_text = $('#output');
            $('#'+$element+' div.section').each(function(){
                var name = $(this).data('id');
                var value = '';
                var type = $(this).find('input').attr('type');
                switch(type) {
                    case 'text':                     
                        value = $(this).find('input').val();
                        break;
                    case 'radio':
                        var r_name = $(this).find('input').attr('name'); 
                        value = $(this).find('input[name='+r_name+']:checked').val();
                        break;
                    default:
                        value = $(this).find('textarea').val();
                } 
                value = value.replace(/\"/g, "'");
                obj['$'+name] = value;
            });
            return_text.val(make_shortcode(shortcode, obj)); 
        }
        function make_shortcode(shortcode, obj){
            $.each( obj, function( key, value ) {
                shortcode = shortcode.replace(key, value);
            });
            return shortcode;
        }
        
        function build_select(){
            $( "#ac_shortcode_builder div.ac_shortcode_builder_tab > div" ).each(function(){
                var name = $(this).attr("id");
                name = $(this).data('name');
                $(this).hide();
                $('#ac_shortcode_builder_select').append($('<option>', {
                    value: '',
                    text: name
                }));
            });
            $( "#ac_shortcode_builder div.ac_shortcode_builder_tab > div" ).first().show();
        }
        function show_shortcode(index){
            $( "#ac_shortcode_builder div.ac_shortcode_builder_tab > div" ).hide();
            $( "#ac_shortcode_builder div.ac_shortcode_builder_tab > div" ).eq(index).show();
        }
        $('#ac_shortcode_builder_select').on('change', function() {
            var index = $('#ac_shortcode_builder_select').prop('selectedIndex');
            show_shortcode(index)
        })
    });
})(jQuery);