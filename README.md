
# GHL OAuth Authentication and API Integration with PHP

This repository serves as a reference for developers aiming to implement GHL OAuth Authentication or utilize GHL APIs using PHP. Whether you're a seasoned developer or just getting started, this guide will help you seamlessly integrate GHL services into your PHP-based projects.


## API Reference

#### 1. Get Access Token

```http
  POST https://services.leadconnectorhq.com/oauth/token
```

| Parameter | Description                |
| :-------- | :------------------------- |
| `client_id` | **Required**.|
| `client_secret` | **Required**.|
| `grant_type` | authorization_code|
| `code` | **Required**.|
| `user_type` | Location/Company |

#### Get Access Token when expired 

```http
  POST https://services.leadconnectorhq.com/oauth/token
```

| Parameter | Description                |
| :-------- | :------------------------- |
| `client_id` | **Required**.|
| `client_secret` | **Required**.|
| `grant_type` | refresh_token|
| `code` | **Required**.|
| `refresh_token` | **Required**.|
| `user_type` | Location/Company |


## Getting Started
If you're new to GHL integration, follow these steps to set up authentication and start using GHL APIs in your PHP application:
### 1. Clone the Repository:
#### git clone 
https://github.com/your-username/ghl-php-integration.git

### 1. Clone the Repository:
#### git clone 
https://github.com/your-username/ghl-php-integration.git

## Documentation
Detailed documentation on GHL OAuth Authentication and API usage can be found in the [official GHL Developer Portal](https://highlevel.stoplight.io/docs/integrations/a04191c0fabf9-authorization).

## Issues and Contributions
#### If you encounter any issues or have suggestions for improvement, feel free to open an issue or submit a pull request. Your contributions are highly appreciated!

