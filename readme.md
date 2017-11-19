### Loftschool test trial assignment

Another Mvc framework.

Consists of some core components and can be extended by modules.
There is Example module in modules/Example directory, so you can understand
contracts and principles.

What is done?

* Routing (with dynamic parameters)
* Controllers
* Entity
* Views
* Emulated persistence (with Repositories, dont want to use ActiveRecord)
* Bootstrapping of components
* Modularity (only a scratch actually, but can be implemented properly)
* Request/Response system.

What has to be done?

* Middleware (authorization, rbac and so on)
* Post data and forms
* File storage (we've got only userdata catalog)
* Proper class loading
* Tests
* Proper configuration system
* Views template inheritance
* Request/Response headers getting/setting