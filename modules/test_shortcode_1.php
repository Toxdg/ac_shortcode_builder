<!-- test 1 shortcode -->
<div id="test_1" data-name="Shortcode 1">
	<!-- div id is wrapper id -->
	<!-- data-name is name to select -->
    <div class="section" data-id="title">
		<!-- data-id is parameter shortcode id -->
        Title<br>
        <input type='text' value="">
    </div>
    <div class="section" data-id="class">
		<input type="radio" name="test_radio" value="class_1" checked>Option 1<br>
		<input type="radio" name="test_radio" value="class_2">Option 2<br>
		<input type="radio" name="test_radio" value="class_3">Option 3<br>
    </div>  
    <div class="section" data-id="text">
        Description<br>
        <textarea></textarea>
    </div>
    <div class="final">[test title="$title" class="$class"]$text[/test]</div>
	<!-- shortcode to validation. $elem is changet by data-id value -->
    <input type="" value="Generate" class="generate_shortcode" data-form="test_1"/>
	<!-- data form is wrapper id -->
</div>