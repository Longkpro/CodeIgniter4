<?php

public function run(array $params)
{
    CLI::write('PHP Version: '. CLI::color(phpversion(), 'yellow'));
    CLI::write('CI Version: '. CLI::color(\CodeIgniter\CodeIgniter::CI_VERSION, 'yellow'));
    CLI::write('APPPATH: '. CLI::color(APPPATH, 'yellow'));
    CLI::write('SYSTEMPATH: '. CLI::color(SYSTEMPATH, 'yellow'));
    CLI::write('ROOTPATH: '. CLI::color(ROOTPATH, 'yellow'));
    CLI::write('Included files: '. CLI::color(count(get_included_files()), 'yellow'));
}
