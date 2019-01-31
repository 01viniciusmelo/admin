### Administrate Users

*   [Installation](#installation)
*   [TestSuite](#testsuite)
*   [EndPoints](#endpoints)


<a name="#installation"></a>
### Installation

- `git clone `
- `cd admin`
- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `npm install`
- `php artisan serve`
- `npm run watch`

- Or Execute [setup.sh](setup.sh)


<a name="#testsuite"></a>
### TestSuite

##### **Feature\Api\Users**
-  ✔ Can get all users
-  ✔ Can store a user
-  ✔ Can update a user
-  ✔ Can delete a specific user

##### **Feature\Users**
- ✔ A guest cannot visit home
- ✔ A guest cannot visit a specific user
- ✔ An authenticated user can visit users index
- ✔ An authenticated user can view a specific user

##### **Unit\Http\Requests\StoreUserRequest**
- ✔ The name field is required
- ✔ The email field is required
- ✔ The email field must be an email
- ✔ The email field must be unique
- ✔ The role id field is required
- ✔ The password field is required
- ✔ The password field must be confirmed

##### **Unit\Models\User**
- ✔ A user model belongs to a role


<a name="#endpoints"></a>
### Endpoints

**User Endpoints**

|   VERB  |  URL  | Description |
| -------|:----:| -----:|
| GET | /users | Show Users view |
| GET | /users/{user} | Show a User's view |

**Users Api Endpoints**

|   VERB  |  URL  |   RouteName |   Description |
| -------|:----:| -----:| -----:|
| GET | /api/users | users.index | Show all Users |
| POST | /api/users | users.store | Create one User |
| PUT | /api/users/{user} | users.update | Update one User |
| DELETE | /api/users/{user} | users.destroy | Delete one User |

**Roles Api Endpoints**

|   VERB  |  URL  |   RouteName |   Description |
| -------|:----:| -----:| -----:|
| GET | /api/roles | roles.index | Show all Roles |
| POST | /api/roles | roles.store | Create one Role |
| PUT | /api/roles/{role} | roles.update | Update one Role |
| DELETE | /api/roles/{role} | roles.destroy | Delete one Role |