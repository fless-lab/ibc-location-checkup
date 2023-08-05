import os

def delete_htaccess_files(folder):
    for root, dirs, files in os.walk(folder):
        for file in files:
            if file.lower() == ".htaccess":
                file_path = os.path.join(root,file)
                os.remove(file_path)
                print(f"Deleted: {file_path}")

if __name__ == "__main__":
    project_path = "."
    delete_htaccess_files(project_path)

"""
$ python clean_project.py
Deleted: .\.idea\.htaccess
Deleted: .\.idea\inspectionProfiles\.htaccess
Deleted: .\app\.htaccess
Deleted: .\app\Exceptions\.htaccess
Deleted: .\app\Http\.htaccess
Deleted: .\app\Mail\.htaccess
Deleted: .\app\Models\.htaccess
Deleted: .\app\Providers\.htaccess
Deleted: .\bootstrap\.htaccess
Deleted: .\bootstrap\cache\.htaccess
Deleted: .\database\factories\.htaccess
Deleted: .\database\seeds\.htaccess
Deleted: .\public\.htaccess
Deleted: .\public\assets\.htaccess
Deleted: .\public\assets\bower_components\ckeditor\skins\kama\images\images\.htaccess
Deleted: .\public\assets\bower_components\ckeditor\skins\moono\moono\.htaccess
Deleted: .\public\assets\bower_components\Flot\examples\series-errorbars\series-errorbars\.htaccess
Deleted: .\public\assets\bower_components\select2\tests\selection\selection\.htaccess
Deleted: .\public\css\.htaccess
Deleted: .\public\fonts\.htaccess
Deleted: .\public\js\.htaccess
Deleted: .\public\Nouveau dossier\.htaccess
Deleted: .\public\single-news\.htaccess
Deleted: .\public\site\.htaccess
Deleted: .\public\svg\.htaccess
Deleted: .\resources\.htaccess
Deleted: .\resources\js\.htaccess
Deleted: .\resources\lang\.htaccess
Deleted: .\resources\sass\.htaccess
Deleted: .\resources\views\.htaccess
Deleted: .\routes\.htaccess
Deleted: .\storage\.htaccess
Deleted: .\storage\app\.htaccess
Deleted: .\storage\framework\.htaccess
Deleted: .\storage\logs\.htaccess
Deleted: .\storage\uploads\.htaccess
Deleted: .\tests\Feature\.htaccess
Deleted: .\tests\Unit\.htaccess
Deleted: .\vendor\.htaccess
Deleted: .\vendor\barryvdh\.htaccess
Deleted: .\vendor\beyondcode\.htaccess
Deleted: .\vendor\bin\.htaccess
Deleted: .\vendor\cartalyst\.htaccess
Deleted: .\vendor\composer\.htaccess
Deleted: .\vendor\dnoegel\.htaccess
Deleted: .\vendor\doctrine\.htaccess
Deleted: .\vendor\dompdf\.htaccess
Deleted: .\vendor\dragonmantank\.htaccess
Deleted: .\vendor\egulias\.htaccess
Deleted: .\vendor\erusev\.htaccess
Deleted: .\vendor\fideloper\.htaccess
Deleted: .\vendor\filp\.htaccess
Deleted: .\vendor\fzaninotto\.htaccess
Deleted: .\vendor\guzzlehttp\.htaccess
Deleted: .\vendor\hamcrest\.htaccess
Deleted: .\vendor\jakub-onderka\.htaccess
Deleted: .\vendor\laravel\.htaccess
Deleted: .\vendor\laravel\framework\src\Illuminate\Database\Query\Query\.htaccess
Deleted: .\vendor\lcobucci\.htaccess
Deleted: .\vendor\league\.htaccess
Deleted: .\vendor\mockery\.htaccess
Deleted: .\vendor\monolog\.htaccess
Deleted: .\vendor\myclabs\.htaccess
Deleted: .\vendor\nesbot\.htaccess
Deleted: .\vendor\nexmo\.htaccess
Deleted: .\vendor\nexmo\client\src\Response\Response\.htaccess
Deleted: .\vendor\nikic\.htaccess
Deleted: .\vendor\nunomaduro\.htaccess
Deleted: .\vendor\opis\.htaccess
Deleted: .\vendor\paragonie\.htaccess
Deleted: .\vendor\paypal\.htaccess
Deleted: .\vendor\phar-io\.htaccess
Deleted: .\vendor\phenx\.htaccess
Deleted: .\vendor\phenx\php-font-lib\.htaccess
Deleted: .\vendor\php-http\.htaccess
Deleted: .\vendor\phpdocumentor\.htaccess
Deleted: .\vendor\phpspec\.htaccess
Deleted: .\vendor\phpunit\.htaccess
Deleted: .\vendor\psr\.htaccess
Deleted: .\vendor\psy\.htaccess
Deleted: .\vendor\psy\psysh\test\fixtures\default\.local\share\psysh\psysh\.htaccess
Deleted: .\vendor\ralouphie\.htaccess
Deleted: .\vendor\ramsey\.htaccess
Deleted: .\vendor\sabberworm\.htaccess
Deleted: .\vendor\sebastian\.htaccess
Deleted: .\vendor\stripe\.htaccess
Deleted: .\vendor\swiftmailer\.htaccess
Deleted: .\vendor\symfony\.htaccess
Deleted: .\vendor\symfony\css-selector\XPath\Extension\Extension\.htaccess
Deleted: .\vendor\theseer\.htaccess
Deleted: .\vendor\tijsverkoyen\.htaccess
Deleted: .\vendor\vlucas\.htaccess
Deleted: .\vendor\webmozart\.htaccess
Deleted: .\vendor\zendframework\.htaccess
"""
