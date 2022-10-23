<?php

namespace Deployer;

require 'recipe/common.php';
require 'contrib/rsync.php';

set('application', 'jamessessford.com');
set('repository', 'git@github.com:jamessessford/jamessessford.com.git');
set('remote_user', 'ubuntu');
set('base_deploy_path', '/var/www');
set('keep_releases', 3);

localhost();

host('rrvwmrrr.com')
    ->set('rsync_src', './build_production')
    ->set('rsync_dest', '{{release_path}}')
    ->set('deploy_path', '{{base_deploy_path}}/jamessessford.com');

task('build', function () {
    on(select('localhost'), function() {
        run('composer install');
        run('./vendor/bin/jigsaw build production');
    });
});

task('release', [
    'deploy:info',
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'rsync',
    'deploy:publish'
]);

task('deploy', [
    'build',
    'release'
])->select('rrvwmrrr.com');

after('deploy:failed', 'deploy:unlock');
