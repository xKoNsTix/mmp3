<?php
namespace Deployer;
require 'recipe/common.php';

set('repository','git@github.com:xKoNsTix/ex.git');

// [Optional] Allocate tty for git clone. Default value is false.
//set('git_tty', true);
// Shared files/dirs between deploys


//Before WP

set('shared_files', ['public/wp-config.php', 'public/.htaccess']);
set('shared_dirs', ['public/wp-content/uploads']);
set('keep_releases', 3);

// AFTER WP

#set('shared_files', ['public/index.html', 'public/.htaccess']);
#set('shared_dirs', ['public/wp-content/uploads']);

// Writable dirs by web server
// set('writable_mode', 'chown');
// set('writable_dirs', ['public/wp-content/uploads']);
//set('allow_anonymous_stats', false);



// Hosts
host('88.198.150.108')
        ->set('remote_user','ex')
        //->set('remote_user','aaron')
        // ->set('become', 'root')

        ->set('deploy_path', '/var/www/ex');
        //->set('deploy_path', '~/app');

// Composer
set('composer_action', false);

// Tasks
desc('Deploy your project');
task('deploy', [
    //'deploy:info',
    'deploy:prepare',
    //'deploy:lock',
    //'deploy:release',
   // 'deploy:update_code',
    //'deploy:shared',
    //'deploy:writable',
    //'deploy:clear_paths',
    //'deploy:symlink',
    //'deploy:unlock',
     'deploy:publish'
]);



// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
