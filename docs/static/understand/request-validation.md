# Caparica Documentation
[table of contents](../../index.md)

## Request Validation

Each request will have a different signature.
The signature will be computed based on the request parameters, and the specific parameter combination will be encrypted with your Secret.

### Validation Process
    1. Generate the request and append the signature
    2. The server will receive the request
        2.1 grab your Secret from its configuration
        2.2 compute a new signature based on your Secret
    3. The server will also compare the request timestamp (if provided) with the current timestamp and deny the request if it is too old (default is - more than 15 minutes old).
    4. If your signature and the server-generated signature match, the request is then executed
