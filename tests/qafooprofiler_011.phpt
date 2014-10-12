--TEST--
XHProf: Stream Summary
--FILE--
<?php

include_once dirname(__FILE__).'/common.php';

$options = array('argument_functions' => array('fopen', 'fgets', 'fclose'));

qafooprofiler_enable(0, $options);

$fh = fopen(__DIR__, "r");
fgets($fh);
fclose($fh);

$fh = fopen(__FILE__, "r");
fgets($fh);
fclose($fh);

$fh = fopen(dirname(__FILE__).'/common.php', "r");
fgets($fh);
fclose($fh);

print_canonical(qafooprofiler_disable());
--EXPECTF--
main()                                  : ct=       1; wt=*;
main()==>dirname                        : ct=       1; wt=*;
main()==>fclose#%d                       : ct=       1; wt=*;
main()==>fclose#%d                       : ct=       1; wt=*;
main()==>fclose#%d                       : ct=       1; wt=*;
main()==>fgets#%d                        : ct=       1; wt=*;
main()==>fgets#%d                        : ct=       1; wt=*;
main()==>fgets#%d                        : ct=       1; wt=*;
main()==>fopen#%s#%d: ct=       1; wt=*;
main()==>fopen#%s/tests/common.php#%d: ct=       1; wt=*;
main()==>fopen#%s/tests/qafooprofiler_011.php#%d: ct=       1; wt=*;
main()==>qafooprofiler_disable          : ct=       1; wt=*;
