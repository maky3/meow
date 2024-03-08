Выборки пользователей, у которых количество постов больше, чем у пользователя их пригласившего.

        SELECT u1.id, u1.name
        FROM users u1
        JOIN users u2 ON u1.invited_by_user_id = u2.id
        WHERE u1.posts_qty > u2.posts_qty

Выборки пользователей, имеющих максимальное количество постов в своей группе.
        SELECT u.id, u.name

        FROM users u
        WHERE u.posts_qty = (
        SELECT MAX(posts_qty)
        FROM users
        WHERE group_id = u.group_id)

Выборки групп, количество пользователей в которых превышает 10000.

        SELECT g.id, g.name
        FROM groups g
        WHERE (SELECT COUNT(*) FROM users WHERE group_id = g.id) > 10000

Выборки пользователей, у которых пригласивший их пользователь из другой группы.

        SELECT u1.id, u1.name
        FROM users u1
        JOIN users u2 ON u1.invited_by_user_id = u2.id
        WHERE u1.group_id != u2.group_id

Выборки групп с максимальным количеством постов у пользователей.

            SELECT g.id, g.name
        FROM groups g
        WHERE (
            SELECT SUM(posts_qty)
            FROM users
            WHERE group_id = g.id
            ) = (
            SELECT MAX(post_sum)
            FROM (
            SELECT SUM(posts_qty) as post_sum
            FROM users
            GROUP BY group_id
            ) as subquery
            )

