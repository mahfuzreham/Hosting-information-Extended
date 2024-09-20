# WHMCS Custom Sidebar Service Information Module

This WHMCS module is designed to display detailed hosting service account information on the client area. It enhances the default product details page by showing essential hosting account credentials, such as usernames, IP addresses, and nameservers, in a user-friendly format.

## Features

- Display hosting account details such as:
  - Username
  - Password
  - Domain
  - Server IP Address
  - Server Hostname
  - Nameserver 1 & 2
- Integrated with WHMCS sidebar to provide an accessible and intuitive layout for clients.
- Custom icon support for each credential displayed.

## Preview

![Service Information Preview](image.png)

## Installation

1. **Upload the Module**:
   - Download the module files and place them in your WHMCS installation directory.
   - Navigate to `/whmcs_root/includes/hooks/`.
   - Create a file named `custom_service_sidebar.php` and paste the module code inside it.

2. **Clear Cache**:
   - After uploading the file, clear your WHMCS template cache by navigating to:
     **Admin Area > System Utilities > System Cleanup > Empty Template Cache**.

## Usage

- Once the module is installed, the sidebar on the product details page in the client area will display the following information:
  - Username, password, and domain details
  - Server information such as IP address, hostname, and nameservers

The service information will be dynamically fetched and displayed based on the client's product data.

## Requirements

- WHMCS v8.0 or later
- PHP 7.4 or later

## Customization

You can easily modify the layout or add more information by editing the `custom_service_sidebar.php` file. This file uses WHMCS hooks to append custom information to the sidebar.

## Support

For any issues or customization requests, feel free to open an issue or contact the repository maintainers.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
