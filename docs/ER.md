
```
// Use DBML to define your database structure
// Docs: https://dbml.dbdiagram.io/docs


Table users {
  id bigint [pk]
  name varchar
  email varchar
  password varchar
  created_at timestamp
  updated_at timestamp
}

Table profile {
  id bigint [pk]
  user_id bigint [ref: > users.id]
  phase_id bigint [ref: > phase.id]
  created_at timestamp
  updated_at timestamp
}

Table phase {
  id bigint [pk]
  number bigint
  created_at timestamp
  updated_at timestamp
}

Table calendars {
  id bigint [pk]
  profile_id bigint [ref: > profile.id]
  date date
  title varchar
  location varchar
}

Table makers {
  id bigint [pk]
  profile_id bigint [ref: > profile.id]
  name varchar
  sales varchar
  option varchar
  star bigint
}

Table features {
  id bigint [pk]
  category_id bigint [ref: > categories.id]
  tag varchar
}

Table categories {
  id bigint [pk]
  name varchar
}

Table makers_features {
  marker_id bigint [ref: > makers.id]
  feature_id bigint [ref: > features.id]
  Note: "多対多の中間テーブル"
}

Table lifeplanlogs {
  id bigint [pk]
  profile_id bigint [ref: > profile.id]
  age bigint
  income bigint
  expense bigint
  balance bigint
}

Table landlogs {
  id bigint [pk]
  profile_id bigint [ref: > profile.id]
  address varchar
  landarea decimal(10,2)
  far decimal(10,2)
  bcr decimal(10,2)
  floor_id bigint [ref: > floors.id]
}

Table floors {
  id bigint [pk]
  floor int
}

Table memologs {
  id bigint [pk]
  profile_id bigint [ref: > profile.id]
  memo varchar
  created_at timestamp
  updated_at timestamp
}

Table bookmark_type {
  id bigint [pk]
  name varchar
  Note: "1=calendars,2=makers,3=landlogs,4=memologs"
}

Table bookmarks {
  id bigint [pk]
  profile_id bigint [ref: > profile.id]
  bookmark_type_id bigint [ref: > bookmark_type.id]
  reference_id bigint
  Note: "bookmark_type_idに応じた対象テーブルのID"
}

```