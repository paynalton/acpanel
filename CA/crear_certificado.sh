#!/bin/bash
openssl req -config openssl.cnf -new -nodes -keyout "private/${1}.key" -out "${1}.csr" -days 365
openssl ca -config openssl.cnf -policy policy_anything -out "certs/${1}.crt" -infiles "${1}.csr"
rm -f "${1}.csr"
cat "certs/${1}.crt" "private/${1}.key" > "p12/${1}.pem"
openssl pkcs12 -export -in "p12/${1}.pem" -out "p12/${1}.p12"
rm -f "p12/${1}.pem""
