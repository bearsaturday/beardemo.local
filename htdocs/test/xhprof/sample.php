<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
function bar($x)
{
    if ($x > 0) {
        bar($x - 1);
    }
}

function foo()
{
    for ($idx = 0; $idx < 5; $idx++) {
        bar($idx);
        $x = strlen('abc');
    }
}

// start profiling

// run program
foo();

// stop profiler
$xhprof_data = xhprof_disable();

// display raw xhprof data for the profiler run
//print_r($xhprof_data);

$XHPROF_ROOT = '';
include_once $XHPROF_ROOT . 'xhprof/xhprof_lib/utils/xhprof_lib.php';
include_once $XHPROF_ROOT . 'xhprof/xhprof_lib/utils/xhprof_runs.php';

// save raw data for this profiler run using default
// implementation of iXHProfRuns.
$xhprof_runs = new XHProfRuns_Default();

// save the run under a namespace "xhprof_foo"
$run_id = $xhprof_runs->save_run($xhprof_data, 'xhprof_foo');

echo "---------------\n" .
     "Assuming you have set up the http based UI for \n" .
     "XHProf at some address, you can view run at \n" .
     "http://<xhprof-ui-address><a href=\"/__xhprof/index.php?run=$run_id&source=xhprof_foo\">xhprof</a>\n" .
     "---------------\n";
