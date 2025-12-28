# Agora RTC Token Builder (PHP)

Lightweight PHP utilities to build Agora RTC / RTM Access Tokens. Use these server-side reference implementations to generate short-lived tokens for clients. Do NOT expose your App Certificate in client code or public repos.

## Files
- `AccessToken.php` — core token build / parse logic
- `RtcTokenBuilder.php` — convenience wrapper for common RTC flows
- `RtcTokenBuilderSample.php` — minimal HTTP endpoint example
- `Util.php` — binary pack / unpack helpers

## Overview
This repository implements token generation compatible with Agora SDKs. The sample endpoint demonstrates a minimal token-issuing HTTP API. Generate tokens on a trusted server and return them to clients.

## Requirements
- PHP 7.0+ (7.4+ recommended)
- PHP extensions: ext-zlib, ext-hash (typically bundled)

## Installation / Setup
1. Copy repository files into your project or web server document root.
2. Provide Agora credentials securely. Prefer environment variables:

macOS / Linux:
```sh
export AGORA_APP_ID="your_app_id"
export AGORA_APP_CERTIFICATE="your_app_certificate"
```

3. Edit `RtcTokenBuilderSample.php` to read credentials from environment variables (example uses `getenv('AGORA_APP_ID')` / `getenv('AGORA_APP_CERTIFICATE')`) instead of hard-coded values.

## Usage (HTTP sample)
Start your PHP server and request:
```sh
curl 'http://localhost/RtcTokenBuilderSample.php?channelName=test&uid=123'
```
Response:
```json
{"token":"<rtc-token>"}
```

## Programmatic usage
Use the helpers in `RtcTokenBuilder.php`:
- RtcTokenBuilder::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, $role, $tokenTTL, $privilegeTTL)
- RtcTokenBuilder::buildTokenWithUserAccount(...)
- RtcTokenBuilder::buildTokenWithUidAndPrivilege(...)
- RtcTokenBuilder::buildTokenWithUserAccountAndPrivilege(...)

See function signatures and comments in `RtcTokenBuilder.php` for details.

## Security
- Never commit your App Certificate to version control.
- Issue tokens only from a secure backend.
- Use short TTLs for tokens and privileges.
- Scope tokens to the minimum privileges required for a client.

## Troubleshooting
- "Invalid token" / join failures: verify App ID and App Certificate, and ensure the token TTL and privileges are set correctly.
- Missing extensions: enable zlib/hash in your PHP configuration.
- Ensure `channelName` and `uid` (or user account) are provided to the sample endpoint.

## Contributing
- Fork, add tests, and open a PR.
- Document API changes in README and add unit tests where applicable.

## License
This repository contains no license by default. To publish this project, add a `LICENSE` file. Recommended: MIT.

Example minimal MIT header for `LICENSE`:
```
MIT License

Copyright (c) YEAR Your Name

Permission is hereby granted, free of charge, to any person obtaining a copy
...
```

Replace YEAR and Your Name and paste full MIT text into `LICENSE`.
```# Agora RTC Token Builder (PHP)

Lightweight PHP utilities to build Agora RTC / RTM Access Tokens. Use these server-side reference implementations to generate short-lived tokens for clients. Do NOT expose your App Certificate in client code or public repos.

## Files
- `AccessToken.php` — core token build / parse logic
- `RtcTokenBuilder.php` — convenience wrapper for common RTC flows
- `RtcTokenBuilderSample.php` — minimal HTTP endpoint example
- `Util.php` — binary pack / unpack helpers

## Overview
This repository implements token generation compatible with Agora SDKs. The sample endpoint demonstrates a minimal token-issuing HTTP API. Generate tokens on a trusted server and return them to clients.

## Requirements
- PHP 7.0+ (7.4+ recommended)
- PHP extensions: ext-zlib, ext-hash (typically bundled)

## Installation / Setup
1. Copy repository files into your project or web server document root.
2. Provide Agora credentials securely. Prefer environment variables:

macOS / Linux:
```sh
export AGORA_APP_ID="your_app_id"
export AGORA_APP_CERTIFICATE="your_app_certificate"
```

3. Edit `RtcTokenBuilderSample.php` to read credentials from environment variables (example uses `getenv('AGORA_APP_ID')` / `getenv('AGORA_APP_CERTIFICATE')`) instead of hard-coded values.

## Usage (HTTP sample)
Start your PHP server and request:
```sh
curl 'http://localhost/RtcTokenBuilderSample.php?channelName=test&uid=123'
```
Response:
```json
{"token":"<rtc-token>"}
```

## Programmatic usage
Use the helpers in `RtcTokenBuilder.php`:
- RtcTokenBuilder::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, $role, $tokenTTL, $privilegeTTL)
- RtcTokenBuilder::buildTokenWithUserAccount(...)
- RtcTokenBuilder::buildTokenWithUidAndPrivilege(...)
- RtcTokenBuilder::buildTokenWithUserAccountAndPrivilege(...)

See function signatures and comments in `RtcTokenBuilder.php` for details.

## Security
- Never commit your App Certificate to version control.
- Issue tokens only from a secure backend.
- Use short TTLs for tokens and privileges.
- Scope tokens to the minimum privileges required for a client.

## Troubleshooting
- "Invalid token" / join failures: verify App ID and App Certificate, and ensure the token TTL and privileges are set correctly.
- Missing extensions: enable zlib/hash in your PHP configuration.
- Ensure `channelName` and `uid` (or user account) are provided to the sample endpoint.

## Contributing
- Fork, add tests, and open a PR.
- Document API changes in README and add unit tests where applicable.

## License
MIT License

Copyright (c) 2025 Sandeep Singh

Permission is hereby granted, free of charge, to any person obtaining a copy