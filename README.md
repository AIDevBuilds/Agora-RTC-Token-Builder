# Agora RTC Token Builder (PHP)

PHP helpers that build Agora RTC access tokens on a server, with a small HTTP endpoint as an example.

The token code is a trimmed copy of the PHP token builder in Agora's open-source tools
([AgoraIO/Tools](https://github.com/AgoraIO/Tools), MIT). Agora's copyright notice is kept in
[LICENSE](LICENSE). Check Agora's repository for the current and complete implementation.

## Files

- `AccessToken.php`: core token build and parse logic
- `RtcTokenBuilder.php`: wrapper for the common RTC flows
- `RtcTokenBuilderSample.php`: minimal HTTP endpoint example
- `Util.php`: binary pack and unpack helpers

## Requirements

- PHP 7.0 or later (7.4 or later recommended)
- PHP extensions `zlib` and `hash` (usually bundled)

## Setup

1. Copy the files into your project or web server directory.
2. Provide your Agora credentials through environment variables, never in code:

```sh
export AGORA_APP_ID="your_app_id"
export AGORA_APP_CERTIFICATE="your_app_certificate"
```

3. Make sure `RtcTokenBuilderSample.php` reads them with `getenv('AGORA_APP_ID')` and
   `getenv('AGORA_APP_CERTIFICATE')`.

## HTTP sample

Start a PHP server and request:

```sh
curl 'http://localhost/RtcTokenBuilderSample.php?channelName=test&uid=123'
```

The response looks like `{"token":"<rtc-token>"}`.

## Use from code

`RtcTokenBuilder.php` provides:

- `RtcTokenBuilder::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, $role, $tokenTTL, $privilegeTTL)`
- `RtcTokenBuilder::buildTokenWithUserAccount(...)`
- `RtcTokenBuilder::buildTokenWithUidAndPrivilege(...)`
- `RtcTokenBuilder::buildTokenWithUserAccountAndPrivilege(...)`

See the comments in the file for each parameter.

## Security

- Never commit your App Certificate.
- Issue tokens only from a trusted backend.
- Use short lifetimes and the smallest set of privileges a client needs.

## Troubleshooting

- Join fails with an invalid token: check the App ID, the App Certificate, and the token and privilege lifetimes.
- Missing extension errors: enable `zlib` and `hash` in your PHP configuration.
- The sample needs both `channelName` and `uid` in the query string.

## License

MIT. See [LICENSE](LICENSE).

The code derived from Agora's token builder stays under Agora's MIT licence.
