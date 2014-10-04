# Caparica Documentation
[table of contents](../../index.md)

## Client Id and Client Secret

The combination of _Client Id_ and _Client Secret_ will be used to identify and validate a request.

This is similar to the username/password combination that most authentication systems use.

The Client Id is public and there is absolutely no problem if it is known

You must ensure the Secret is kept secret within your servers, and you will use it to sign requests.

Please never sign requests in *Any Client side language* as JavaScript as the Secret will become known to all your users
