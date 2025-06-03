<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;

class TranslateMessages extends Command
{
    protected $signature = 'translate:messages {lang}';
    protected $description = 'Automatski prijevod poruka na drugi jezik';

    public function handle()
    {
        $targetLang = $this->argument('lang');
        $source = File::getRequire(resource_path('lang/en/messages.php'));
        $translated = [];

        $client = new Client();

        foreach ($source as $key => $text) {
            $response = $client->post('https://translation.googleapis.com/language/translate/v2', [
                'query' => [
                    'key' => env('GOOGLE_TRANSLATE_API_KEY'),
                    'q' => $text,
                    'source' => 'en',
                    'target' => $targetLang,
                    'format' => 'text',
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            $translated[$key] = $data['data']['translations'][0]['translatedText'];
            $this->info("Translated [$text] => [{$translated[$key]}]");
        }

        File::put(
            resource_path("lang/{$targetLang}/messages.php"),
            '<?php return ' . var_export($translated, true) . ';'
        );
    }
}
