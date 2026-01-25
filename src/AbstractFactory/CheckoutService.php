class LinkedInPost
{
public string $text;
public array $hashtags = [];
public ?string $image = null;
public ?string $link = null;

public function preview(): void
{
echo $this->text . PHP_EOL;
echo implode(' ', $this->hashtags) . PHP_EOL;
echo $this->image ? "Image: {$this->image}\n" : '';
echo $this->link ? "Link: {$this->link}\n" : '';
}
}
