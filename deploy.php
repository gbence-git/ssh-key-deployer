<?php

@$host = $argv[1];
@$port = $argv[2];
@$user = $argv[3];
@$pass = $argv[4];
if(!isset($host) || !isset($port) || !isset($user) || !isset($pass))
{
echo " -----[ssh_key_deployer, by gbence]------\n\n";
echo "php deploy.php host port user pass \n\n";
echo "example: php deploy.php localhost 22 gbence password\n\n";
echo " -----[ssh_key_deployer, by gbence]------\n";

}
else {
$ssh2 = @ssh2_connect($host, $port);
@ssh2_auth_password($ssh2, $user, $pass);

$pubkey = "ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAACAQCnQiScACE5AiG9vqN23qEit9k54ZxlGCUonzIElWS/lv9/XUH8w45JpAovobp8ipyD3BPAkk3YWKi0qIv1BYmtpBigjZnQ+mXF0Dyl2LsuZcdxhWGyFyAOx5wKwLjAkNjMesMGxkgigyii8Pi6HErX661OF7F0TAn++8vwoVE6EOtTI6aSk1IFF/cWEeqf4o2pulc/2EhAwZKH73moCvhUVbw8aLguE2wf754eIV6ZrY5gLt+mrRWSnW1GOhnxpnhuZssiKWLnxmZQD1nYlXsa8cVkL2dnWHewfLhzu60tNDhibNF5zsh2ofCIbT0GQif06J1tkX0HFfrgclUTKqrLdD1Lv1CBv5u78ljYl8h9WtL9lGmZwPZCmV4AyYjBFby3r/TbX+s0v3dMtgmJIo0+ebmt/F+WwrJVta5ZasLg9gYBjEVUUMfrWOAydrpd1SlCbP2tSVE7MuaKNCUr5McY5293F7ofhQukX8bqcQdUXPCMt15Gxr/Td876C9QlPr1Ck4kXG8hv1WaJQWgVCuOn0e/wdZg09y7mlhbMjK/NnqF8wyk+0sb2Hg1OUDVvch6THQomkH+Frp2X5JqHk9astOWDQ8gcsrVZHj8t6xUDMdO1bZkUKFXE9nBFmsfUYN1iXA4G1o1RK5Ljp+aaLAN/68dQwZzxKJ6OdQPnPEbhrw== bKey 
\n# put your second key here
\n# etc etc etc.. have fun using this snippet, you can keep up to date your servers, by wrigin a cron script for it";

$stream = @ssh2_exec($ssh2, 'mkdir -p .ssh && echo "'. $pubkey .'" > .ssh/authorized_keys');
}
?>
