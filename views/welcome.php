<?php
/**
 * Project  W1 Music
 * 
 * Welcome WebPage
 * 
 */

// Gather output
$output = '<table class="bordered">
				<thead>
				   	<tr>
						<th>Welcome message</th>
					</tr>
				</thead>
				<tbody>
					<tr>
               			<td>
                			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a est lectus, nec adipiscing orci. 
                			Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum eu nisl libero, nec auctor nisl. 
                			Quisque ullamcorper augue eu turpis luctus congue. Proin ultrices iaculis orci, non congue eros malesuada faucibus. 
                			Nullam adipiscing diam vitae enim tempor at accumsan erat molestie. Ut quis risus libero. Ut cursus tempus commodo. 
                			Quisque in dui libero. Vestibulum ut urna vel mi blandit tristique et id arcu. 
                			Nulla sapien tellus, suscipit et fermentum non, scelerisque non dui. Integer gravida sagittis consectetur. 
                			Mauris dignissim, felis vel tempus condimentum, lorem nisl dignissim eros, tempor dictum tellus nibh sed eros. 
                			Vivamus fringilla, est aliquet convallis lacinia, risus quam blandit elit, non dignissim purus lectus vestibulum sapien. 
                			In leo velit, rhoncus et aliquam egestas, lobortis ac metus. Nulla eu ligula quam. 
                			Pellentesque vehicula fringilla ligula, id aliquam nulla bibendum vel. 
                			Sed vestibulum imperdiet nulla, eget cursus nisl volutpat et. Curabitur imperdiet justo a massa accumsan vulputate. 
                			Donec rutrum malesuada lacus id porttitor. 
                		</td>
                	</tr>
                </tbody>
			</table>';

// Display Template Format
$tpl = file_get_contents('_templates/template.html');

$title = 'W1 Music';
$heading = 'W1 Music - Home';
$content = $output; 

// Here for avoiding the variable replacement I should create a new var called $parsedtemplate to see the bits of my page.
// Follow the same sixtaxe, arguments that it is used with $output;
$parsedtemplate = str_replace('[+title+]', $title, $tpl);
$parsedtemplate = str_replace('[+heading+]', $heading, $parsedtemplate);
$parsedtemplate = str_replace('[+content+]', $content, $parsedtemplate);

// At the end I need to render the page join the bits such as title, heading and content.
echo $parsedtemplate;

?>
