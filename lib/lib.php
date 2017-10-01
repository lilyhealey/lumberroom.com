<?
function set_cookie($name=null, $value=null, $expires=null, $path="/")
{
	if(!empty($value))
	{
		setcookie($name, $value, $expires, $path);
	}
}

function get_cookie($name)
{
	if(isset($_COOKIE[$name]))
		return $_COOKIE[$name];
	else
		return null;
}

function process_body($raw_body) {
  $pattern = '/\n*(.+)\n*/';
  $replacement = '<p>$1</p>';
  $b = preg_replace($pattern, $replacement, $raw_body);

  $pattern = '/<p> {3,}(.*?)<\\/p>/';
  $replacement = '<p class="indent">$1</p>';
  $b = preg_replace($pattern, $replacement, $b);

  $pattern = '/\n/';
  $replacement = '';
  $b = preg_replace($pattern, $replacement, $b);

  $pattern = '/<p>\s*<\\/p>/';
  $replacement = '';
  $b = preg_replace($pattern, $replacement, $b);

  return $b;
}
?>
