@servers(['web' => 'dovhopolyi-do@192.168.10.240'])

@setup
    $releases_dir = $server_dir . '/releases/' . $remove_dir;
    $releases_git_dir = $server_dir . '/releases/' . $remove_dir . '/.git';
    $app_dir = $server_dir . '/app';
@endsetup

@story('deploy')
    preparation
    run_composer
    update_symlinks
    artisan_command
    frontend_build
    remove_old_releases
@endstory

@task('preparation')
    echo 'Move Folder'
    rm -rf {{ $releases_git_dir }}
    cd {{ $server_dir }}
    mkdir -p storage
@endtask

@task('run_composer')
    echo "composer install"
    cd {{ $releases_dir }}
    composer install --prefer-dist --no-scripts -q -o
@endtask

@task('update_symlinks')
    echo "Linking storage directory"
    rm -rf {{ $releases_dir }}/storage
    ln -s {{ $server_dir }}/storage {{ $releases_dir }}/storage

    echo 'Linking .env file'
    ln -s {{ $server_dir }}/.env {{ $releases_dir }}/.env

    echo 'Linking current release'
    rm -rf {{ $app_dir }}
    ln -s {{ $releases_dir }} {{ $app_dir }}
@endtask

@task('artisan_command')
    echo 'Artisan Command'
    php {{ $releases_dir }}/artisan view:clear --quiet
    php {{ $releases_dir }}/artisan cache:clear --quiet
    php {{ $releases_dir }}/artisan config:cache --quiet
    php {{ $releases_dir }}/artisan migrate --force
    php {{ $releases_dir }}/artisan storage:link
    php {{ $releases_dir }}/artisan queue:restart --quiet
    echo "Cache cleared"
@endtask

@task('frontend_build')
    echo 'Frontend Build'
    cd {{ $releases_dir }}
    npm install && npm run dev
@endtask

@task('remove_old_releases')
    echo 'Remove OLD release'
    cd {{ $server_dir }}/releases
    rm -rf `ls -t | tail -n +2`
@endtask
