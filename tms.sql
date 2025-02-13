Use tms;

-- Table: users
-- (User ID: admin, Password: admin123)
INSERT INTO users (id, name, email, email_verified_at, password, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at, remember_token, current_team_id, profile_photo_path, created_at, updated_at) VALUES (1, 'admin', 'admin@tms.com', NULL, '$2y$12$nRvndK2yHcZe4PmOXKfJI.OK6QCJvFfjiWN5v8X.n7ObmHMN8D7Pq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-12 10:29:10', '2025-02-12 10:29:10');

-- Table: categories
INSERT INTO categories (id, name, created_at, updated_at) VALUES (1, 'Personal', '2025-02-12 19:00:04', '2025-02-12 19:00:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (2, 'Work', '2025-02-12 19:01:04', '2025-02-12 19:01:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (3, 'Travel', '2025-02-12 19:02:04', '2025-02-12 19:02:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (4, 'Health', '2025-02-12 19:03:04', '2025-02-12 19:03:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (5, 'Finance', '2025-02-12 19:04:04', '2025-02-12 19:04:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (6, 'Shopping', '2025-02-12 19:05:04', '2025-02-12 19:05:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (7, 'Education', '2025-02-12 19:06:04', '2025-02-12 19:06:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (8, 'Family', '2025-02-12 19:07:04', '2025-02-12 19:07:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (9, 'Entertainment', '2025-02-12 19:08:04', '2025-02-12 19:08:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (10, 'Technology', '2025-02-12 19:09:04', '2025-02-12 19:09:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (11, 'Food', '2025-02-12 19:10:04', '2025-02-12 19:10:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (12, 'Sports', '2025-02-12 19:11:04', '2025-02-12 19:11:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (13, 'Books', '2025-02-12 19:12:04', '2025-02-12 19:12:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (14, 'Music', '2025-02-12 19:13:04', '2025-02-12 19:13:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (15, 'Movies', '2025-02-12 19:14:04', '2025-02-12 19:14:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (16, 'Hobbies', '2025-02-12 19:15:04', '2025-02-12 19:15:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (17, 'Social', '2025-02-12 19:16:04', '2025-02-12 19:16:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (18, 'Pets', '2025-02-12 19:17:04', '2025-02-12 19:17:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (19, 'News', '2025-02-12 19:18:04', '2025-02-12 19:18:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (20, 'Gaming', '2025-02-12 19:19:04', '2025-02-12 19:19:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (21, 'Art', '2025-02-12 19:20:04', '2025-02-12 19:20:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (22, 'Fitness', '2025-02-12 19:21:04', '2025-02-12 19:21:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (23, 'Automotive', '2025-02-12 19:22:04', '2025-02-12 19:22:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (24, 'Real Estate', '2025-02-12 19:23:04', '2025-02-12 19:23:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (25, 'Lifestyle', '2025-02-12 19:24:04', '2025-02-12 19:24:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (26, 'Environment', '2025-02-12 19:25:04', '2025-02-12 19:25:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (27, 'Legal', '2025-02-12 19:26:04', '2025-02-12 19:26:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (28, 'Newsletters', '2025-02-12 19:27:04', '2025-02-12 19:27:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (29, 'Volunteering', '2025-02-12 19:28:04', '2025-02-12 19:28:04');
INSERT INTO categories (id, name, created_at, updated_at) VALUES (30, 'Networking', '2025-02-12 19:29:04', '2025-02-12 19:29:04');

-- Table: tasks
INSERT INTO tasks (id, title, description, due_date, status, category_id, user_id, created_at, updated_at) VALUES (1, 'Task - Yangon', 'Do something', '2025-02-13', 'pending', 1, 1, '2025-02-13 00:38:43', '2025-02-13 00:38:43');
INSERT INTO tasks (id, title, description, due_date, status, category_id, user_id, created_at, updated_at) VALUES (2, 'Task - Mandalay', 'Do something', '2025-02-13', 'pending', 1, 1, '2025-02-13 00:38:43', '2025-02-13 00:38:43');
INSERT INTO tasks (id, title, description, due_date, status, category_id, user_id, created_at, updated_at) VALUES (3, 'Task - Mawlamyine', 'Do something', '2025-02-13', 'pending', 1, 1, '2025-02-13 00:38:43', '2025-02-13 00:38:43');
INSERT INTO tasks (id, title, description, due_date, status, category_id, user_id, created_at, updated_at) VALUES (4, 'Task - Taunggyi', 'Do something', '2025-02-13', 'pending', 1, 1, '2025-02-13 00:38:43', '2025-02-13 00:38:43');
