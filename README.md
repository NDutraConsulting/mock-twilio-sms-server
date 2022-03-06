
## About Laravel

Mock Twilio SMS Server is a web api for simulating Twilio's Outbound SMS Messaging under load.


### Features

- Mock Twilio Queue
- Models:
  - Messages
  - Statuses (Phase 2)
- Status Webhook Response Job
- Get Message Status Endpoint
- Config Phone → Status Map
  - +1200-555-0200 => Delivered
  - +1200-555-0500 => Failed
  - +1200-555-0503 => Undeliverable
  - +1200-555-0100 => Queued
  - +1200-555-0102 => Processing
  - +1200-555-0308 => Sent


## Security Vulnerabilities

If you discover a security vulnerability within Mock Twilio Server, please send an e-mail to Nikko Dutra Bouck via [ndutra.consulting@gmail.com](mailto:ndutra.consulting@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
