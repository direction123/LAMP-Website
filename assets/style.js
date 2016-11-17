$(document).ready(function(){
    $(":submit").hover(function(){
        $(this).css({"color":"red"});
    }, function(){
        $(this).css({"color":""});
    });
    $("button").hover(function(){
        $(this).css({"color":"red"});
    }, function(){
        $(this).css({"color":""});
    });
    $('#password, #confirm_password').on('keyup', function () {
        if ($('#passWord').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else
            $('#message').html('Not Matching').css('color', 'red');
    });
    $('input:radio[name="bs"]').change(
        function(){
            if ($(this).is(':checked') && $(this).val() == 'Same as Shipping Address') {
                $( "#billAddress").val($('#address').val());
            }
        });
});

$.fn.superScript = function() {
    var chars = '+−=()0123456789AaÆᴂɐɑɒBbcɕDdðEeƎəɛɜɜfGgɡɣhHɦIiɪɨᵻɩjJʝɟKklLʟᶅɭMmɱNnɴɲɳŋOoɔᴖᴗɵȢPpɸrRɹɻʁsʂʃTtƫUuᴜᴝʉɥɯɰʊvVʋʌwWxyzʐʑʒꝯᴥβγδθφχнნʕⵡ',
        sup   = '⁺⁻⁼⁽⁾⁰¹²³⁴⁵⁶⁷⁸⁹ᴬᵃᴭᵆᵄᵅᶛᴮᵇᶜᶝᴰᵈᶞᴱᵉᴲᵊᵋᶟᵌᶠᴳᵍᶢˠʰᴴʱᴵⁱᶦᶤᶧᶥʲᴶᶨᶡᴷᵏˡᴸᶫᶪᶩᴹᵐᶬᴺⁿᶰᶮᶯᵑᴼᵒᵓᵔᵕᶱᴽᴾᵖᶲʳᴿʴʵʶˢᶳᶴᵀᵗᶵᵁᵘᶸᵙᶶᶣᵚᶭᶷᵛⱽᶹᶺʷᵂˣʸᶻᶼᶽᶾꝰᵜᵝᵞᵟᶿᵠᵡᵸჼˤⵯ';

    return this.each(function() {
        this.value = this.value.replace(/<sup[^>]*>(.*?)<\/sup>/g, function(x) {
            var str = '',
                txt = $.trim($(x).unwrap().text());

            for (var i=0; i<txt.length; i++) {
                var n = chars.indexOf(txt[i]);
                str += (n!=-1 ? sup[n] : txt[i]);
            }
            return str;
        });
    });
}

$('input').superScript();