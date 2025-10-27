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
  created_at timestamp
  updated_at timestamp
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
}

Table loan_simulations {
  id bigint [pk]
  profile_id bigint [ref: > profile.id]
  loan bigint
  rate decimal(5,2)
  loan_term int
  age int
  income bigint
  expense bigint
  created_at timestamp
  updated_at timestamp
}


Table landlogs {
  id bigint [pk]
  profile_id bigint [ref: > profile.id]
  address varchar
  landarea decimal(10,2)
  far decimal(10,2)
  bcr decimal(10,2)
  floor int
  buildable_area decimal(10,2)
  range bigint
}

Table checklists {
  id bigint [pk]
  profile_id bigint [ref: > profile.id]
  phase_id bigint [ref: > phase.id] 
  checked  boolean 
  created_at timestamp
  updated_at timestamp
}

Table phase {
  id bigint [pk] 
  phase varchar
  list varchar
}
