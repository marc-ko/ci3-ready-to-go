# API Documentation

## Base URL

All URLs referenced in the documentation have the following base:

```
http://yourwebsite.com/api/
```

## Endpoints

### `testing`

- **URL**: `testing`
- **Method**: `GET`
- **Description**: Test endpoint to check if the API is working.
- **Example**: `GET http://yourwebsite.com/api/testing`
- **Response**: `200`

### `updateUserData`

- **URL**: `updateUserData`
- **Method**: `POST`
- **Description**: Update user data in the `member_poses` table.
- **Body**:

```json
{
    "user_id": "integer",
    "name": "string",
    "correct_poses": "integer",
    "incorrect_poses": "integer",
    "relate_aauth_id": "integer"
}
```

- **Example**: `POST http://yourwebsite.com/api/updateUserData` with body:

```json
{
    "user_id": 1,
    "name": "John Doe",
    "correct_poses": 10,
    "incorrect_poses": 5,
    "relate_aauth_id": 123
}
```

- **Response**: No response body. The user data in the database is updated.

### `getCurrentCount`

- **URL**: `getCurrentCount`
- **Method**: `GET`
- **Description**: Get the current count of a user from the `member_poses` table.
- **Query parameters**: `get_id` (integer)
- **Example**: `GET http://yourwebsite.com/api/getCurrentCount?get_id=1`
- **Response**: A JSON object representing the user's record.

### `registerUser`

- **URL**: `registerUser`
- **Method**: `POST`
- **Description**: Register a new user.
- **Body**:

```json
{
    "user_id": "integer",
    "name": "string",
    "correct_poses": "integer",
    "incorrect_poses": "integer"
}
```

- **Example**: `POST http://yourwebsite.com/api/registerUser` with body:

```json
{
    "user_id": 2,
    "name": "Jane Doe",
    "correct_poses": 15,
    "incorrect_poses": 5
}
```

- **Response**: No response body. A new user is created in the database.

---

Please replace `http://yourwebsite.com` with your actual website URL. Also, note that this is a basic documentation. For a real-world API, you would also want to include information about error responses, authentication, rate limiting, etc.