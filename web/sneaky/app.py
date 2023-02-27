#!/usr/bin/python3
from flask import *
import dns.resolver

app = Flask(__name__)

blacklisted = ['']

@app.route("/")
def home():
    if request.headers.getlist("X-Forwarded-For"):
        user_agent_host = request.headers.getlist("X-Forwarded-For")[0]
        try:
            ip = dns.resolver.resolve(user_agent_host, 'A')[0]
            if str(ip) == '127.0.0.1': 
                return open("flag.txt", "r").read()
            else: return "Not allowed."
        except Exception as e:
            return str(e)
    else:
        return "Not allowed."

app.run()