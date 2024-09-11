# Easy Data Exfiltrate

This repository contains the techniques for data exfiltration after compromising a server. 

### Using Python Server
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

