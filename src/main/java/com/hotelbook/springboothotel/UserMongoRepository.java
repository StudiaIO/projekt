package com.hotelbook.springboothotel;

import org.springframework.data.mongodb.repository.MongoRepository;

public interface UserMongoRepository extends MongoRepository<user, String>{
}
