##
# Server Controler srcipt
#
# @Author	domis045
# @Date		30 January 2016
# @Comment	Don't run your server with root !
##

#!/bin/bash
#Variables
DIR=$2 			# Serverio Failu direktorija.
EXEC=$3 		# Serverio paleidimo failas.
SCREENNAME=$4 		# Screen pavadinimas

# Funkcijos
function serverStatus {
if find_screen "$SCREENNAME" >/dev/null; then
    echo "1"
else
    echo "0"
fi
		}
function find_screen {
    if screen -ls "$1" | grep -o "^\s*[0-9]*\.$1[ "$'\t'"](" --color=NEVER -m 1 | grep -oh "[0-9]*\.$1" --color=NEVER -m 1 -q >/dev/null; then
        screen -ls "$1" | grep -o "^\s*[0-9]*\.$1[ "$'\t'"](" --color=NEVER -m 1 | grep -oh "[0-9]*\.$1" --color=NEVER -m 1 2>/dev/null
        return 0
    else
        echo "$1"
        return 1
    fi
}
function startServer {
	if find_screen "$SCREENNAME" >/dev/null; then
		echo "Serveris jau paleistas!!!"
		exit 1;
	fi
	if [ -d $DIR ]; then
		cd $DIR
		if [ -f $EXEC ]; then
			screen -dmS $SCREENNAME ./$EXEC
			echo "$SCREENNAME paleistas !"
		else
			echo "Error: serverio paleidimo failas ($EXEC) nerastas !"
		fi
	else
		echo "Error: ($DIR) nerasta direktorija !"
	fi
}
function stopServer {
	screen -S $SCREENNAME -X kill
	echo "$SCREENNAME isjungtas."
}
#Main
if [ -z "$1" ]||[ -z "$2" ]||[ -z "$3" ]||[ -z "$4" ];
then
	echo "Usage : $0 {start|stop|restart|status} Dir Exe Name"
	exit 1
fi
case "$1" in
	start)
		startServer
		;;
	status)
		serverStatus
		;;
	stop)
		stopServer
		;;
	esac
exit