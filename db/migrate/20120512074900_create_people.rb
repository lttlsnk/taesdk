class CreatePeople < ActiveRecord::Migration
  def change
    create_table :people do |t|
      t.varchar(20) :name
      t.int :age
      t.varchar(2) :sex

      t.timestamps
    end
  end
end
