<?php
namespace Deployer;

require 'recipe/common.php';

set('application', 'jamessessford.com');
set('repository', 'git@github.com:jamessessford/jamessessford.com.git');
set('git_tty', true);
set('shared_dirs', []);
set('shared_files', []);
set('writable_dirs', []);
set('base_deploy_path', '/var/www');
set('keep_releases', 3);

host('rrvwmrrr.com')
    ->user('ubuntu')
    ->set('deploy_path', '{{base_deploy_path}}/jamessessford.com');

task('build', function() {
    run('composer install');
    run('./vendor/bin/jigsaw build production');
});

task('upload', function(){
    upload(__DIR__ . '/build_production/', '{{release_path}}');
});

task('release', [
    'deploy:prepare',
    'deploy:release',
    // 'upload',
    'deploy:shared',
    'deploy:writable',
    'deploy:symlink',
]);

task('deploy', [
    'release',
    'build',
    'cleanup',
    'success',
]);

after('deploy:failed', 'deploy:unlock');
