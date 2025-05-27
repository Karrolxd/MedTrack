<?php

namespace Database\Seeders;

use App\Models\Icd11Code;
use Illuminate\Database\Seeder;
use XMLReader;

class Icd11CodesSeeder extends Seeder
{
    /**
     * Importuje kody ICD-11 z pliku XML
     *  storage/app/icd11_2023-01_PRERELEASE_pl_in.xml
     */
    public function run(): void
    {
        $file = storage_path('app/icd11_2023-01_PRERELEASE_pl_in.xml');

        if (! is_readable($file)) {
            $this->command->error('Plik XML nie istnieje: '.$file);
            return;
        }

        $reader = new XMLReader();
        $reader->open($file, null, LIBXML_NOWARNING | LIBXML_NONET);

        $bar = $this->command->getOutput()->createProgressBar();
        $bar->start();

        while ($reader->read()) {

            // Interesuje nas węzeł <element>
            if ($reader->nodeType === XMLReader::ELEMENT && $reader->localName === 'element') {

                $node = simplexml_load_string($reader->readOuterXML());

                $code = (string) $node->code;
                if (! $code) {
                    $bar->advance();
                    continue;                // elementy rozdziałów nie mają kodu
                }

                // ----------- TYTUŁ -----------
                $title = null;

                // 1) <title language="pl">
                foreach ($node->title as $t) {
                    if ((string) $t['language'] === 'pl') {
                        $title = (string) $t;
                        break;
                    }
                }

                // 2) <title language="en">
                if (! $title) {
                    foreach ($node->title as $t) {
                        if ((string) $t['language'] === 'en') {
                            $title = (string) $t;
                            break;
                        }
                    }
                }

                // 3) pierwszy indexTerm PL
                if (! $title) {
                    $firstLabel = $node->xpath('indexTerm/label[language="pl"]/value')[0] ?? null;
                    $title = $firstLabel ? (string) $firstLabel : null;
                }

                // 4) awaryjnie użyj samego kodu
                $title ??= $code;

                // ----------- DEFINICJA -----------
                $definition = null;
                foreach ($node->definition as $d) {
                    if ((string) $d['language'] === 'pl') {
                        $definition = trim((string) $d);
                        break;
                    }
                }
                if (! $definition) {
                    foreach ($node->definition as $d) {
                        if ((string) $d['language'] === 'en') {
                            $definition = trim((string) $d);
                            break;
                        }
                    }
                }

                // ----------- ZAPIS -----------
                Icd11Code::updateOrCreate(
                    ['code'  => $code],
                    ['title' => $title, 'definition' => $definition]
                );

                $bar->advance();
            }
        }

        $reader->close();
        $bar->finish();
        $this->command->newLine();
        $this->command->info('Import ICD-11 zakończony.');
    }
}
