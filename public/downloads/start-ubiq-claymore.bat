setx GPU_FORCE_64BIT_PTR 0
setx GPU_MAX_HEAP_SIZE 100
setx GPU_USE_SYNC_OBJECTS 1
setx GPU_MAX_ALLOC_PERCENT 100
setx GPU_SINGLE_ALLOC_PERCENT 100

EthDcrMiner64.exe -epool stratum+tcp://eu2.ubiqpool.io:8008 -ewal 0xC0057917E1bB3C684F24E18a99eEF8B1E632944b -epsw x -eworker charity_rig%random%%random%%random% -allcoins 1