# API Documentation

## Base URL
```
http://localhost:8000/api
```

## Authentication

All API requests require authentication using Laravel Sanctum tokens. Include the token in the Authorization header:
```
Authorization: Bearer {your-token}
```

## Endpoints

### Authentication Endpoints

#### Register User
- **URL:** `POST /register`
- **Description:** Register a new user account
- **Rate Limit:** 6 requests per minute
- **Request Body:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "phone": "+1234567890",
    "bio": "Software developer",
    "avatar": "https://example.com/avatar.jpg"
}
```
- **Response (201):**
```json
{
    "message": "User registered successfully",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "phone": "+1234567890",
        "bio": "Software developer",
        "avatar": "https://example.com/avatar.jpg",
        "role": "user",
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
    },
    "token": "1|abc123..."
}
```

#### Login User
- **URL:** `POST /login`
- **Description:** Authenticate user and get access token
- **Rate Limit:** 6 requests per minute
- **Request Body:**
```json
{
    "email": "john@example.com",
    "password": "password123"
}
```
- **Response (200):**
```json
{
    "message": "Login successful",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "phone": "+1234567890",
        "bio": "Software developer",
        "avatar": "https://example.com/avatar.jpg",
        "role": "user",
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
    },
    "token": "1|abc123..."
}
```

#### Logout User
- **URL:** `POST /logout`
- **Description:** Revoke current access token
- **Authentication:** Required
- **Response (200):**
```json
{
    "message": "Logged out successfully"
}
```

#### Get Current User
- **URL:** `GET /user`
- **Description:** Get authenticated user information
- **Authentication:** Required
- **Response (200):**
```json
{
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "phone": "+1234567890",
        "bio": "Software developer",
        "avatar": "https://example.com/avatar.jpg",
        "role": "user",
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
    }
}
```

### Profile Management Endpoints

#### Get Own Profile
- **URL:** `GET /profile/me`
- **Description:** Get current user's profile
- **Authentication:** Required
- **Response (200):**
```json
{
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "phone": "+1234567890",
        "bio": "Software developer",
        "avatar": "https://example.com/avatar.jpg",
        "role": "user",
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
    }
}
```

#### List All Profiles (Admin Only)
- **URL:** `GET /profiles`
- **Description:** Get paginated list of all user profiles
- **Authentication:** Required
- **Authorization:** Admin role required
- **Query Parameters:**
  - `page` (optional): Page number for pagination
- **Response (200):**
```json
{
    "users": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "John Doe",
                "email": "john@example.com",
                "phone": "+1234567890",
                "bio": "Software developer",
                "avatar": "https://example.com/avatar.jpg",
                "role": "user",
                "created_at": "2024-01-01T00:00:00.000000Z",
                "updated_at": "2024-01-01T00:00:00.000000Z"
            }
        ],
        "per_page": 10,
        "total": 1
    }
}
```

#### Get Specific Profile
- **URL:** `GET /profiles/{id}`
- **Description:** Get specific user profile
- **Authentication:** Required
- **Authorization:** Users can only view their own profile, admins can view any
- **Response (200):**
```json
{
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "phone": "+1234567890",
        "bio": "Software developer",
        "avatar": "https://example.com/avatar.jpg",
        "role": "user",
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
    }
}
```

#### Create User Profile (Admin Only)
- **URL:** `POST /profiles`
- **Description:** Create a new user profile
- **Authentication:** Required
- **Authorization:** Admin role required
- **Request Body:**
```json
{
    "name": "Jane Doe",
    "email": "jane@example.com",
    "password": "password123",
    "phone": "+1234567890",
    "bio": "Designer",
    "avatar": "https://example.com/avatar.jpg",
    "role": "user"
}
```
- **Response (201):**
```json
{
    "message": "User created successfully",
    "user": {
        "id": 2,
        "name": "Jane Doe",
        "email": "jane@example.com",
        "phone": "+1234567890",
        "bio": "Designer",
        "avatar": "https://example.com/avatar.jpg",
        "role": "user",
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
    }
}
```

#### Update Profile
- **URL:** `PUT /profiles/{id}`
- **Description:** Update user profile
- **Authentication:** Required
- **Authorization:** Users can only update their own profile, admins can update any
- **Request Body:**
```json
{
    "name": "John Updated",
    "email": "john.updated@example.com",
    "phone": "+1234567890",
    "bio": "Updated bio",
    "avatar": "https://example.com/new-avatar.jpg"
}
```
- **Response (200):**
```json
{
    "message": "Profile updated successfully",
    "user": {
        "id": 1,
        "name": "John Updated",
        "email": "john.updated@example.com",
        "phone": "+1234567890",
        "bio": "Updated bio",
        "avatar": "https://example.com/new-avatar.jpg",
        "role": "user",
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
    }
}
```

#### Delete Profile (Admin Only)
- **URL:** `DELETE /profiles/{id}`
- **Description:** Delete user profile
- **Authentication:** Required
- **Authorization:** Admin role required
- **Response (200):**
```json
{
    "message": "User deleted successfully"
}
```

## Error Responses

### Validation Error (422)
```json
{
    "message": "The given data was invalid.",
    "errors": {
        "email": ["The email field is required."],
        "password": ["The password field is required."]
    }
}
```

### Authentication Error (401)
```json
{
    "message": "Unauthenticated."
}
```

### Authorization Error (403)
```json
{
    "message": "Unauthorized"
}
```

### Not Found Error (404)
```json
{
    "message": "No query results for model [App\\Models\\User] 1"
}
```

### Rate Limit Error (429)
```json
{
    "message": "Too Many Attempts."
}
```

## Testing with cURL

### Register a new user:
```bash
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "phone": "+1234567890",
    "bio": "Software developer"
  }'
```

### Login:
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "john@example.com",
    "password": "password123"
  }'
```

### Get user profile (with token):
```bash
curl -X GET http://localhost:8000/api/profile/me \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

### Update profile (with token):
```bash
curl -X PUT http://localhost:8000/api/profiles/1 \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Updated",
    "bio": "Updated bio"
  }'
``` 