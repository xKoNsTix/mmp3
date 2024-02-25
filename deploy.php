<?php
namespace Deployer;

require 'recipe/common.php';

// Repository
set('repository', 'git@github.com:xKoNsTix/mmp3.git');

// Keep the last 3 releases
set('keep_releases', 3);

// Hosts
host('88.198.150.108')
    ->set('remote_user', 'ex')
    ->set('deploy_path', '/var/www/ex/dist'); // Deploy directly into the dist directory

// Define shared files and directories.
// As it's a static site, you might not need any.
// Just an example if later you have some shared resources.
// set('shared_files', []);
// set('shared_dirs', []);

// Define writable dirs.
// Static sites usually don't need this, but it's here if you need it.
// set('writable_dirs', []);

// Disable Composer action since it's a static HTML site
set('composer_action', false);

// Main task for deployment
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    // 'deploy:shared', // Uncomment if you have shared resources
    // 'deploy:writable', // Uncomment if needed
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails, automatically unlock.
after('deploy:failed', 'deploy:unlock');
