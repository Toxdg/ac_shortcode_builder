<!-- test 2 shortcode -->
<div id="test_2" data-name="Shortcode 2">
    <div class="section" data-id="title">
        Tytuł<br>
        <input type='text' value="">
    </div>
    <div class="section" data-id="img">
        Url obraz<br>
        <input type='text' value="">
    </div>  
    <div class="section" data-id="text">
        Opis<br>
        <input type='text' value="">
    </div>
    <div class="section" data-id="label">
        Opis dodatkowy<br>
        <input type="radio" name="gender" value="male" checked> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <input type="radio" name="gender" value="other"> Other

    </div>
    <div class="final">[test title="$title" label="$label" img="$img"]$text[/test]</div>
    <input type="" value="Generuj" class="generate_shortcode" data-form="test_2"/>
</div>